<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Manage';

    protected static ?int $navigationSort = 0;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'last_name', 'mobile'];
    }

    protected static int $globalSearchResultsLimit = 5;

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('First Name')
                                    ->required()
                                    ->markAsRequired(false),
                                Forms\Components\TextInput::make('last_name')
                                    ->label('Last Name')
                                    ->required()
                                    ->markAsRequired(false),
                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->autocomplete(false)
                                    ->unique(ignoreRecord: true)
                                    ->unique(User::class, 'email', ignoreRecord: true)
                                    ->required()
                                    ->markAsRequired(false),
                                Forms\Components\Select::make('gender')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->options(['Male' => 'Male', 'Female' => 'Female']),
                                Forms\Components\TextInput::make('mobile')
                                    ->required()
                                    ->markAsRequired(false)
                                    ->maxLength(9)
                                    ->minLength(9)
                                    ->step(9)
                                    ->tel()
                                    ->prefix('+967'),
                            ])
                    ]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Toggle::make('status')
                                    ->default(true),
                                Forms\Components\TextInput::make('password')
                                    ->password()
                                    ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                                    ->revealable()
                                    ->autocomplete(false)
                                    ->required()
                                    ->markAsRequired(false)
                                    ->confirmed()
                                    ->visibleOn('create'),
                                Forms\Components\TextInput::make('password_confirmation')
                                    ->password()
                                    ->required()
                                    ->markAsRequired(false)
                                    ->revealable()
                                    ->autocomplete(false)
                                    ->same('password')
                                    ->label('Confirm Password')
                                    ->visibleOn('create'),
                                //
                                Forms\Components\Select::make('roles')
                                    ->relationship('roles', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->required()
                                    ->markAsRequired(false)
                                    ->searchable(),
                            ])
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //

                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('mobile'),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Role'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('profile_photo_path')
                    ->label('Uesr Profile'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([

                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

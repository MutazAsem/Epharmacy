<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use Doctrine\DBAL\Schema\Schema;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                        ->schema([
                Forms\Components\TextInput::make('title')
                        ->required()
                        ->live(onBlur:true),
                Forms\Components\MarkdownEditor::make('content'),
                Forms\Components\FileUpload::make('image')
                        ->image(),
                Forms\Components\TextInput::make('user_id')
                        ->label('User ID')
                        ->hidden(), 


                                    ]),

                    ]);
           
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Article title '),
                Tables\Columns\TextColumn::make('content'),
                Tables\Columns\ImageColumn::make('image'),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('user_id')
                     ->relationship('writer','name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArcticleNewsResource\Pages;
use App\Filament\Resources\ArcticleNewsResource\RelationManagers;
use App\Models\ArcticleNews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;

use function Laravel\Prompts\form;


class ArcticleNewsResource extends Resource
{
    protected static ?string $model = ArcticleNews::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

                Forms\Components\FileUpload::make('thumbnail')
                ->required()
                ->image(),

                Forms\Components\Select::make('category_id')
                ->relationship('category','name')
                ->searchable()
                ->preload()
                ->required(),

                Forms\Components\Select::make('author_id')
                ->relationship('author','name')
                ->searchable()
                ->preload()
                ->required(),

                Forms\Components\Select::make('is_featured')
                ->options([
                    'featured' => 'Featured',
                    'not_featured' => 'Not Featured',
                ])

                ->required(),

                Forms\Components\RichEditor::make('content')
                ->required()
                ->columnSpanFull()
                ->toolbarButtons([
                    'attachFiles',
                    'blockquote',
                    'bold',
                    'bulletList',
                    'codeBlock',
                    'h2',
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ]),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(),

                Tables\Columns\TextColumn::make('is_featured')
                ->badge()
                ->color(fn (string $state): string => match ($state){
                    'featured' => 'success',
                    'not_featured' => 'danger',
                }),

                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\ImageColumn::make('thumbnail'),




                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListArcticleNews::route('/'),
            'create' => Pages\CreateArcticleNews::route('/create'),
            'edit' => Pages\EditArcticleNews::route('/{record}/edit'),
        ];
    }
}
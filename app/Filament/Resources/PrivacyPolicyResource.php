<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrivacyPolicyResource\Pages;
use App\Filament\Resources\PrivacyPolicyResource\RelationManagers;
use App\Models\Policy;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\text;

class PrivacyPolicyResource extends Resource
{
    protected static ?string $model = Policy::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                MarkdownEditor::make('content')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('content')
                    ->limit(150),
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
            'index' => Pages\ListPrivacyPolicies::route('/'),
            'create' => Pages\CreatePrivacyPolicy::route('/create'),
            'edit' => Pages\EditPrivacyPolicy::route('/{record}/edit'),
        ];
    }
}

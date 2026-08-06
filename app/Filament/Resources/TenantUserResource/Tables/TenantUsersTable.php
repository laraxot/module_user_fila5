<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Model\GetModelFieldsByModelAction;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

/**
 * Colonne derivate dallo schema reale del model risolto.
 *
 * `TenantUserResource::getModel()` non e' fisso: passa da `XotData::getTenantUserClass()`,
 * quindi ogni progetto puo' sostituirlo con una pivot dallo schema diverso. Un elenco di
 * colonne scritto a mano vale per una sola di quelle implementazioni: sulle altre le celle
 * restano vuote, perche' Filament non ha modo di distinguere "attributo assente" da "valore
 * nullo" e stampa il vuoto in entrambi i casi. Questa classe legge le colonne dalla tabella
 * e costruisce da li'.
 */
class TenantUsersTable extends XotBaseResourceTable
{
    /** @var list<string> Colonne di audit: in coda e nascoste per default. */
    private const AUDIT_FIELDS = ['created_by', 'updated_by', 'deleted_by', 'deleted_at'];

=======
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class TenantUsersTable extends XotBaseResourceTable
{
>>>>>>> laraxot/dev
    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
<<<<<<< HEAD
        $model = app(XotData::make()->getTenantUserClass());
        $columns = ['id' => TextColumn::make('id')->sortable()];
        if (! $model instanceof Model) {
            return $columns;
        }

        $fields = app(GetModelFieldsByModelAction::class)->execute($model);

        foreach ($fields as $field) {
            // `_old` e simili: colonne di servizio lasciate dalle migrazioni legacy,
            // nessun significato per chi legge l'elenco.
            if ('id' === $field || str_starts_with($field, '_') || \in_array($field, self::AUDIT_FIELDS, true)) {
                continue;
            }

            if (str_ends_with($field, '_at')) {
                $columns[$field] = TextColumn::make($field)->dateTime()->sortable();

                continue;
            }

            $relationColumn = $this->relationColumn($model, $field);
            if (null !== $relationColumn) {
                [$name, $column] = $relationColumn;
                $columns[$name] = $column;

                continue;
            }

            $columns[$field] = TextColumn::make($field)->searchable();
        }

        foreach (self::AUDIT_FIELDS as $field) {
            if (! \in_array($field, $fields, true)) {
                continue;
            }
            $columns[$field] = str_ends_with($field, '_at')
                ? TextColumn::make($field)->dateTime()->toggleable(isToggledHiddenByDefault: true)
                : TextColumn::make($field)->toggleable(isToggledHiddenByDefault: true);
        }

        return $columns;
    }

    /**
     * Per una foreign key `<nome>_id` con relazione omonima sul model, mostra l'etichetta
     * del record correlato invece dell'identificativo grezzo. Se il model correlato non ha
     * una colonna `name` si resta sulla foreign key: meglio un id leggibile di una cella vuota.
     *
     * @return array{0: string, 1: Column}|null
     */
    private function relationColumn(Model $model, string $field): ?array
    {
        if (! str_ends_with($field, '_id')) {
            return null;
        }

        $relation = Str::camel(Str::beforeLast($field, '_id'));
        if (! method_exists($model, $relation)) {
            return null;
        }

        $relationInstance = $model->{$relation}();
        if (! $relationInstance instanceof Relation) {
            return null;
        }

        $related = $relationInstance->getRelated();

        $relatedFields = app(GetModelFieldsByModelAction::class)->execute($related);
        if (! \in_array('name', $relatedFields, true)) {
            return null;
        }

        return [$relation, TextColumn::make($relation.'.name')->searchable()];
=======
        return [
            'id' => TextColumn::make('id')->sortable(),
            'uuid' => TextColumn::make('uuid'),
            'user_id' => TextColumn::make('user_id'),
            'tenant_id' => TextColumn::make('tenant_id'),
            'role' => TextColumn::make('role'),
            'permissions' => TextColumn::make('permissions'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
            'deleted_at' => TextColumn::make('deleted_at')->dateTime()->toggleable(),
            'updated_by' => TextColumn::make('updated_by')->toggleable(),
            'created_by' => TextColumn::make('created_by')->toggleable(),
            'deleted_by' => TextColumn::make('deleted_by')->toggleable(),
        ];
>>>>>>> laraxot/dev
    }
}

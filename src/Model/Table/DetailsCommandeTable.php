<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetailsCommande Model
 *
 * @property \App\Model\Table\CommandesTable&\Cake\ORM\Association\BelongsTo $Commandes
 * @property \App\Model\Table\MaterielsTable&\Cake\ORM\Association\BelongsTo $Materiels
 *
 * @method \App\Model\Entity\DetailsCommande newEmptyEntity()
 * @method \App\Model\Entity\DetailsCommande newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DetailsCommande> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetailsCommande get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DetailsCommande findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DetailsCommande patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DetailsCommande> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsCommande|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DetailsCommande saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DetailsCommande>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailsCommande>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetailsCommande>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailsCommande> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetailsCommande>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailsCommande>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetailsCommande>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetailsCommande> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DetailsCommandeTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('details_commande');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Commandes', [
            'foreignKey' => 'commande_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Materiels', [
            'foreignKey' => 'materiel_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('commande_id')
            ->notEmptyString('commande_id');

        $validator
            ->integer('materiel_id')
            ->notEmptyString('materiel_id');

        $validator
            ->integer('quantite')
            ->requirePresence('quantite', 'create')
            ->notEmptyString('quantite');

        $validator
            ->decimal('prix_total')
            ->requirePresence('prix_total', 'create')
            ->notEmptyString('prix_total');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['commande_id'], 'Commandes'), ['errorField' => 'commande_id']);
        $rules->add($rules->existsIn(['materiel_id'], 'Materiels'), ['errorField' => 'materiel_id']);

        return $rules;
    }
}

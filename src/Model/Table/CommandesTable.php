<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commandes Model
 *
 * @property \App\Model\Table\DetailsCommandeTable&\Cake\ORM\Association\HasMany $DetailsCommande
 *
 * @method \App\Model\Entity\Commande newEmptyEntity()
 * @method \App\Model\Entity\Commande newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Commande> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commande get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Commande findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Commande patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Commande> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commande|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Commande saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Commande>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Commande>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Commande>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Commande> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Commande>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Commande>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Commande>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Commande> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CommandesTable extends Table
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

        $this->setTable('commandes');
        $this->setDisplayField('nom_client');
        $this->setPrimaryKey('id');

        $this->hasMany('DetailsCommande', [
            'foreignKey' => 'commande_id',
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
            ->scalar('nom_client')
            ->maxLength('nom_client', 255)
            ->requirePresence('nom_client', 'create')
            ->notEmptyString('nom_client');

        $validator
            ->dateTime('date_commande')
            ->requirePresence('date_commande', 'create')
            ->notEmptyDateTime('date_commande');

        $validator
            ->boolean('rendue')
            ->requirePresence('rendue', 'create')
            ->notEmptyString('rendue');

        return $validator;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Materiels Model
 *
 * @property \App\Model\Table\DetailsCommandeTable&\Cake\ORM\Association\HasMany $DetailsCommande
 *
 * @method \App\Model\Entity\Materiel newEmptyEntity()
 * @method \App\Model\Entity\Materiel newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Materiel> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Materiel get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Materiel findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Materiel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Materiel> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Materiel|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Materiel saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Materiel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Materiel>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Materiel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Materiel> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Materiel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Materiel>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Materiel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Materiel> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MaterielsTable extends Table
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

        $this->setTable('materiels');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->hasMany('DetailsCommande', [
            'foreignKey' => 'materiel_id',
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
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->integer('quantite_disponible')
            ->requirePresence('quantite_disponible', 'create')
            ->notEmptyString('quantite_disponible');

        $validator
            ->decimal('prix_location')
            ->requirePresence('prix_location', 'create')
            ->notEmptyString('prix_location');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}

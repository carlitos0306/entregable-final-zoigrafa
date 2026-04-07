<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     */
    protected array $_accessible = [
        'nombre' => true,
        'apellido' => true,
        'correo' => true,
        'telefono' => true,
        'password' => true,
        'language' => true,
        'rol' => true, // <--- IMPORTANTE: Ahora el rol es editable
        'created' => true,
        'modified' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     */
    protected array $_hidden = [
        'password',
    ];

    /**
     * Hash password automáticamente antes de guardar
     */
    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return $password;
    }
}
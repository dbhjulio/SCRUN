<?php
use Migrations\AbstractMigration;

class Scrun001 extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('municipios');
        $table
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('uf', 'string', [
                'default' => null,
                'limit' => 2,
                'null' => false,
            ])
            ->addColumn('codi_estd', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('desc_estd', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addIndex(
                [
                    'nome',
                ]
            )
            ->create();

        $table = $this->table('perfis');
        $table
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addIndex(
                [
                    'nome',
                ]
            )
            ->create();

        $table = $this->table('perfis_usuarios');
        $table
            ->addColumn('perfil_id', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('usuario_id', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'perfil_id',
                ]
            )
            ->addIndex(
                [
                    'usuario_id',
                ]
            )
            ->create();

        $table = $this->table('usuarios');
        $table
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('municipio_id', 'integer', [
                'default' => 3106200,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('senha', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('criado', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modificado', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'nome',
                ]
            )
            ->addIndex(
                [
                    'email',
                ]
            )
            ->addIndex(
                [
                    'municipio_id',
                ]
            )
            ->addIndex(
                [
                    'status',
                ]
            )
            ->addIndex(
                [
                    'modificado',
                ]
            )
            ->create();

        $this->table('perfis_usuarios')
            ->addForeignKey(
                'perfil_id',
                'perfis',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'usuario_id',
                'usuarios',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

    }

    public function down()
    {
        $this->table('perfis_usuarios')
            ->dropForeignKey(
                'perfil_id'
            )
            ->dropForeignKey(
                'usuario_id'
            );

        $this->dropTable('municipios');
        $this->dropTable('perfis');
        $this->dropTable('perfis_usuarios');
        $this->dropTable('usuarios');
    }
}

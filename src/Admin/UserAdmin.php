<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\FieldDescription\FieldDescriptionInterface;
use Sonata\AdminBundle\Route\RouteCollectionInterface;

final class UserAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('username')
            ->add('roles')
            // ->add('password')
            ->add('firstName')
            ->add('lastName');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->add('username')
            ->add('roles', FieldDescriptionInterface::TYPE_CHOICE, [
                'choices' => [
                    'ROLE_MASTER' => 'MASTER',
                    'ROLE_ADMIN' => 'ADMIN',
                    'ROLE_USER' => 'USER',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            // ->add('password')
            ->add('firstName')
            ->add('lastName')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            // ->add('id')
            ->add('username')
            // ->add('roles', FieldDescriptionInterface::TYPE_CHOICE, [
            //     'multiple' => true,
            //     'expanded' => true,
            // ])
            ->add('password')
            ->add('firstName')
            ->add('lastName');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
        ->add('id')
        ->add('username')
        ->add('roles', FieldDescriptionInterface::TYPE_CHOICE, [
            'choices' => [
                'ROLE_MASTER' => 'MASTER',
                'ROLE_ADMIN' => 'ADMIN',
                'ROLE_USER' => 'USER',
            ],
            'multiple' => true,
            'expanded' => true,
            ])
            // ->add('password')
            ->add('firstName')
            ->add('lastName');
        // dd($this->getSubject());
    }

    protected function configureRoutes(RouteCollectionInterface $collection): void
    { 
        // $collection->remove('edit');
        // $collection->remove('create');
    }
}

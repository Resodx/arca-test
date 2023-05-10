<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Doctrine\Common\Collections\ArrayCollection;

final class CompanyAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('title')
            ->add('phone')
            ->add('address')
            ->add('zipcode')
            ->add('city')
            ->add('state')
            ->add('description');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->add('title')
            ->add('phone')
            ->add('address')
            ->add('zipcode')
            ->add('city')
            ->add('state')
            ->add('description')
            ->add('category', null, [
                'associated_property' => 'name',
            ])
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
            
            ->with('Company', ['class' => 'col-md-9'])
                ->add('title')
                ->add('phone')
                ->add('address')
                ->add('zipcode')
                ->add('city')
                ->add('state')
                ->add('description')
            ->end()
            ->with('Category', ['class' => 'col-md-3'])
                ->add('category', EntityType::class, [
                        'class' => Category::class,
                        'choice_label' => 'name',
                        'multiple' => true,
                ])
            ->end();
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('title')
            ->add('phone')
            ->add('address')
            ->add('zipcode')
            ->add('city')
            ->add('state')
            ->add('description');
    }
}

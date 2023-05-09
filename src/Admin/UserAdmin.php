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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bundle\SecurityBundle\Security;

final class UserAdmin extends AbstractAdmin
{

    public function __construct(
        private Security $security,
    ) {
        $user = $this->security->getUser();
    }

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

        $user = $this->security->getUser();
        if (!(in_array('ROLE_MASTER', $user->getRoles()))) {
            $actions = [
                'show' => [],
            ];
        } else {
            $actions = [
                'show' => [],
                'edit' => [],
                'delete' => [],
            ];
        }

        $list
            ->add('id')
            ->add('username')
            ->add('roles', FieldDescriptionInterface::TYPE_CHOICE, [
                'choices' => [
                    'ROLE_MASTER' => 'MASTER',
                    'ROLE_ADMIN' => 'ADMIN',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            // ->add('password')
            ->add('firstName')
            ->add('lastName')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => $actions,
            ]);
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            // ->add('id')
            ->add('username')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'MASTER' => 'ROLE_MASTER',
                    'ADMIN' => 'ROLE_ADMIN',
                    'USER' => 'ROLE_USER',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
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

<?php
/**
 * Created by PhpStorm.
 * User: tof
 * Date: 26/01/2019
 * Time: 09:26
 */

namespace App\Form;




use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')
            ->add('content');
    }

}
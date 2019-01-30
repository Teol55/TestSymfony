<?php
/**
 * Created by PhpStorm.
 * User: tof
 * Date: 26/01/2019
 * Time: 09:26
 */

namespace App\Form;




use App\Entity\Article;
use App\Entity\User;
use App\Repository\UserRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, [
            'help' => 'Choose something catchy!'
        ])
            ->add('content')
        ->add('publishedat',null,[
            'widget'=> 'single_text'
        ])
        ->add('author',EntityType::class,[
            'class'=> User::class,
            'choice_label'=> function(User $user){
            return sprintf('(%d)%s',$user->getId(),$user->getEmail());},
            'placeholder' => 'Choose an author',
            'choices'=> $this->userRepository->findAllEmailAlphabeticale(),
            'invalid_message' => 'Symfony is too smart for your hacking!',
        ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class'=> Article::class]);
    }

}
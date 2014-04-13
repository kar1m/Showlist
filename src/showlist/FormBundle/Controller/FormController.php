<?php



namespace showlist\FormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use showlist\FormBundle\Entity\User;
use showlist\FormBundle\Entity\Serie;
use showlist\FormBundle\Entity\Trailer;

class FormController extends Controller
{
  public function indexAction()
  {
    $mailer = $this->container->get('mailer'); // On a donc accès au conteneur
    // On récupère le service
    $antispam = $this->container->get('showlist_form.antispam');

    $text = "Hi there !  zizi.fff@mail.com is my email address and http://google.com is a link https://lol.fr linklinklink   ";
    // Je pars du principe que $text contient le texte d'un message quelconque
    if ($antispam->isSpam($text)) {
      throw new \Exception('Votre message a été détecté comme spam !');
    }



    //Exemple Persister un objet
    //Creation d'un user
    $user1 = new User();
    $user1->setNom('Thabet');
    $user1->setPrenom('Zied');
    $user1->setEmail('zied.thab@yahoo.com');
    $user1->setSexe(0);
    $user1->setDateNaissance(new \DateTime());

    // On récupère l'EntityManager
    $em = $this->getDoctrine()->getManager();

     // Étape 1 : On « persiste » l'entité
    $em->persist($user1);

    // Étape 2 : On « flush » tout ce qui a été persisté avant
    $em->flush();


    //Exemple Updater un objet
    // On récupère l'article d'id 5. On n'a pas encore vu cette méthode find(), mais elle est simple à comprendre
    // Pas de panique, on la voit en détail dans un prochain chapitre dédié aux repositories
    $user2 = $em->getRepository('showlistFormBundle:User')->find(1);

    // On modifie cet article, en changeant la date à la date d'aujourd'hui
    $user2->setDateNaissance(new \Datetime());

    // Ici, pas besoin de faire un persist() sur $article2. En effet, comme on a récupéré cet article via Doctrine,
    // il sait déjà qu'il doit gérer cette entité. Rappelez-vous, un persist ne sert qu'à donner la responsabilité de l'objet à Doctrine.

    // Enfin, on applique les changements à la base de données
    $em->flush();


    $serie1 = new Serie(); 
    $serie1->setTitle("How I Met Your Mother");
    $trailerHIMYM = new Trailer();
    $trailerHIMYM->setUrl("http://www.youtube.com/watch?v=aJtVL2_fA5w");
    $serie1->setTrailerLink($trailerHIMYM);

    $em->persist($serie1);
    //No need for persist(trailer) because of cascade persist

    $em->flush();

    return $this->render('showlistFormBundle:Form:index.html.twig') ;

  }
  public function showAction()
  {
	return $this->render('showlistFormBundle:Form:index.html.twig',array('nom' => 'Zizi'));
  }
  public function voirAction($slug,$id,$format)
  {
	return new Response("Affichage de l'article d'id : ".$id." et de nom : ".$slug.".".$format."." );
  }
}
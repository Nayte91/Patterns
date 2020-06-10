# Pattern state (Behavior)

Ce pattern permet de découpler un objet de ses différents états.

## Pitch simple

Il permet de régler 2 problèmes :

* Un objet qui change de comportement quand son état change,
* Ses états doivent être définis indépendamment de l'objet, et donc rajouter un état ne doit pas changer les autres états.

Créer des méthodes pour chaque état dans l'objet lui même n'est pas flexible du tout car si quelque chose doit changer, tout l'objet doit changer.

## Version du site "Read the docs" 

(https://designpatternsphp.readthedocs.io/en/latest/Behavioral/State/README.html).

Cette proposition utilise le même exemple mais va droit au but avec un objet "Order", une interface, et 3 états pour l'exemple.

"Order" initialise le premier Etat lors de sa création ("StateCreated"), impose l'utilisation de l'interface "State", et possède 2 méthodes :
* Une pour passer à l'état suivant, qui sera imposée dans l'interface (elle ne peut pas ne pas exister donc)
* Une pour tester le fonctionnement, un petit "__toString()" pour renvoyer le nom de l'état.

L'interface "State" va donc imposer les 2 méthodes, pour passer à l'état suivant, et pour renvoyer le nom de l'état.

Les 3 états en exemple vont réagir différemment à ces 2 méthodes imposées par interface :
* le __toString() va bien évidemment renvoyer 3 noms différents,
* Dans proceedToNext(), "Created" sait que le prochain état sera "Shipped", et "Shipped" sait qu'ensuite c'est "Done",
* L'état "StateDone" n'oublie pas d'implanter également proceedToNext(), mais totalement vide.

## Version du livre :

La version du livre propose une réalisation avec une classe abstraite à hériter.

On a un objet commande qui enregistre le premier état (ici, "en cours") lors de sa création, et une méthode pour passer à l'état suivant.

On a donc la classe abstraite "EtatCommande" qui va imposer son constructeur, et ses méthodes obligatoires (public abstract function) pour les états qui vont en hériter.

3 états qui héritent de cette classe, à savoir "EnCours", "Validee" et "Livree" :
* On voit par exemple que dans la classe "Livree", il n'est plus possible d'effacer le panier, ajouter ou retirer un produit. Les méthodes sont bien là (car imposées par héritage) mais sont vides.
* La classe "EnCours" sait que le prochain état, si on veut utiliser etatSuivant(), est "Validee". Et "Validee" sait que le prochain sera "Livree"
* On voit également qu'il est possible d'ajouter ou retirer un produit tant qu'on est dans l'état "EnCours", mais ce n'est plus possible en "Validee". Par contre on peut encore annuler la commande.

Pour le reste, le livre choisi de stocker les produits d'une commande dans une classe "ListeProduit" itérable. On a aussi un petit objet "Produit" pour aller au bout de l'exemple.

Le code est testable avec le fichier main.php.

Cette proposition est un peu lourde, mais montre comment gérer des méthodes que l'on retrouve dans chaque Etat.
Elle a également le mérite de fabriquer le pattern avec une classe héritée, alors qu'il est beaucoup plus courant de le voir avec une interface.

## Version de Wikipedia

TODO : à traduire en PHP !

## Exemples d'utilisation

Il peut être retrouvé partout où un objet va avoir plusieurs états au cours de sa vie :

* Une commande d'un produit en ligne (les étapes classiques connues sur internet : en cours, validée, payée, livrée, archivée),
* Un tournoi ou évènement (En construction, à venir, en cours, terminé),
* Le composant Symfony "Workflow" est construit autour de ce pattern.

## Conclusion

Pattern extrêmement utile, qui mérite d'être dégainé - ou au moins envisagé - dès qu'on doit gérer l'état d'un objet.
Il est facile à mettre en place, possède quelques variantes qui peuvent le rendre plus puissant, aucun gros défaut connu.

## Sources
Wikipedia : https://en.wikipedia.org/wiki/State_pattern Diagrammes efficaces, Overview parfait, court et à lire absolument.
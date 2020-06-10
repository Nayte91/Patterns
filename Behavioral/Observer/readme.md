# Pattern observer (Behavior)

Ce pattern permet de faire le lien entre des classes auxquelles il arrive de changer,
et d'autres classes qui ont besoin de produire une action lorsque la première change.

## Pitch simple

On a une classe observée qui est amenée à changer au cours de sa vie (par exemple un "tournoi"), et une ou des classes observeuse(s) qui ont besoin d'être mise au courant quand quelque chose change (par exemple une "vue" pour des spectateurs).

Dans "tournoi", on va faire une collection d'observeurs, et une méthode de notification qui va appeler "update()" sur toute notre collection. 

Dans "vue", on prévoit une méthode publique "update()" qui sera appelée quand quelque chose change dans "tournoi".

Finalement, dans les setters de tournoi, on rajoute un petit appel vers "notifier()".

C'est la version la plus simple, avec un énorme couplage entre notre tournoi et nos vues.
Le pattern Observer va donc rendre ça plus générique et élégant, pour pouvoir universaliser ce comportement.

## Version du livre :

L'exemple du livre construit from scratch le pattern.
Il fait aussi le choix d'avoir une classe abstraite à hériter pour les sujets à observer.
* Une classe abstraite "sujet" qui sera héritée par les objets que l'on veut observer
* Une interface "Observeur" que les objets observeurs devront implémenter
* Une classe concrète de voiture, que l'on observera,
* Une classe concrète de vue qui va observer des voitures.

La classe abstraite a des méthodes pour attacher et détacher un observeur dans un array (déclaré bien sûr), et une méthode pour notifier à tous les éléments de cet array que l'objet à changé.
Pour se faire, on appelle une méthode publique de "mise à jour" sur ces observeurs.

L'interface elle, assure du coté des observeurs qu'ils aient cette fameuse méthode "mise à jour", et du coté de la classe abstraite, on Type les objets à attacher avec cette interface.

Il reste alors, petite finesse, dans l'objet observé, de ne pas oublier d'appeler sa méthode "notifier" dans les setters qui nous intéressent.

## Version "Read the docs" 

(https://designpatternsphp.readthedocs.io/en/latest/Behavioral/Observer/README.html).
La version du site propose de ne fabriquer que 2 classes, l'observée et l'observeuse.
Pour le comportement, on va utiliser ce que SPL propose.

* Une classe observée, ici un User, qui va implémenter SPLSubject.
Elle va également utiliser SplObjectStorage à la place d'un simple array pour stocker les observeurs. 
* L'interface SPLSubject donc, qui impose les méthodes attach, detach, et notify.
* L'interface SplObserver, qui sera implémentée par les observeurs. Elle impose une méthode update.
La classe sujet type aussi là dessus sur attach et detach.
* La classe observeuse, ici UserObserver. Elle implémente logiquement SplObserver.
Pour le reste, elle choisi de stocker les users qui ont changé dans un tableau.

## Exemples d'utilisation

Les barres de progression (installation d'un logiciel par exemple) sont basés là dessus. 
On ne refait pas une barre à chaque fois, elle reçoit les informations d'update de l'installer pour illustrer la progression.

Symfony l'utilise massivement pour tout ce qui est eventlisteners et eventSuscribers :

## Conclusion

La version élégante est composé de 4 pièces (le sujet, le comportement du sujet pour prévenir et stocker les observeurs, le comportement de l'observeur et l'observeur)

Utiliser SPL permet intelligemment de n'avoir à s'occuper que des 2 classes métier (SPL fourni les 2 interfaces), et par rapport à l'exemple du livre, on n'a pas besoin d'hériter du comportement du sujet (ce qui est super handicapant).
Par contre, cela alourdi un peu la classe observée, car on doit implémenter les 3 méthodes de l'interface.

## Sources
Wikipedia : https://fr.wikipedia.org/wiki/Observateur_(patron_de_conception)
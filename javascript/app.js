const loader = document.querySelector('.loader'); 
/* on prend le loader dans le document css .loader 
de cette maniere on peut le gerer le css en javascript  */

/* pris sur internet il n'y avais pas d'explication sur comment sa fobnctionne */

setTimeout(function() { /* une fois que le chargement de la page est terminé
on fait apelle a une fonction pour ouvrir la page 'principale.php' apres avoir attendus 
2 seconde */
    window.location.href = 'principale.php';
}, 2000);

/* je l'ai pris sur internet il n'y avais pas d'explication sur comment sa fobnctionne */
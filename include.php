<?php

   include_once 'Entity/ELuogo.php';
   include_once 'Entity/ECategoria.php';
   include_once 'Entity/EEvento_p.php';
   include_once 'Entity/EEvento_g.php';
   include_once 'Entity/ECarta.php';
   include_once 'Entity/EAcquisto.php';
   include_once 'Entity/EBiglietto.php';
   include_once 'Entity/EUtente_R.php';
   include_once 'Entity/ECommento.php';
   include_once 'Entity/EImmagine.php';

   include_once 'Controller/CGestioneLuogo.php';
   
   include_once 'Foundation/FDatabase.php';
   include_once 'Foundation/FCategoria.php';
   include_once 'Foundation/FEvento_g.php';
   include_once 'Foundation/FCarta.php';
   include_once 'Foundation/FLuogo.php';
   include_once 'Foundation/FEvento_p.php';
   include_once 'Foundation/FUtente_R.php';
   include_once 'Foundation/FAcquisto.php';
   include_once 'Foundation/FPersistenceManager.php';
   include_once 'Foundation/FBiglietto.php';
   include_once 'Foundation/FCommento.php';

   include_once 'View/VVisualizzaEventoP.php';
   include_once 'View/Vlogin.php';
   include_once 'View/VNuovoEventoGratis.php';
   include_once 'View/VHomePage.php';

   include_once 'Controller/CFrontController.php';
   include_once 'Controller/CGestioneLuogo.php';
   include_once 'Controller/CHomepage.php';

   include_once 'Smarty/smarty-libs/libs/Smarty.class.php';

?>
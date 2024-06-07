<?php

            // Vérifier si une session est active
            if (isset($_SESSION['module'])) {
                // Afficher le statut de la session et sa valeur
                echo "<p>(La session est active et son statut est : " . $_SESSION['module'] . ")</p>";
            } else {
                // Si aucune session active n'est trouvée
                echo "<p>Aucune session active n'est trouvée.</p>";
            }
?>
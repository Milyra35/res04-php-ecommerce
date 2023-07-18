<?php

require 'AbstractManager.php';

class OrderManager extends AbstractManager {

    public function saveOrder(Order $order): bool {

        // Récupérer les valeurs de l'objet Order pour l'insertion dans la base de données
        $orderId = $order->getId();
        $date = $order->getDate()->format('Y-m-d H:i:s');
        $productId = $order->getProduct()->getId();
        $userId = $order->getUser()->getId();
        $price = $order->getPrice();

        // Exemple de requête d'insertion SQL
        $sql = "INSERT INTO orders (id, date, product_id, user_id, price) VALUES (?, ?, ?, ?, ?)";

        // Préparer la requête avec la connexion à la base de données
        $stmt = $this->db()->prepare($sql);

        // Binder les valeurs aux paramètres de la requête
        $stmt->bind_param("issid", $orderId, $date, $productId, $userId, $price);

        // Exécuter la requête
        $result = $stmt->execute();

        // Vérifier si l'insertion s'est bien déroulée
        if ($result) {
            return true; // Retourner true si la sauvegarde a réussi
        } else {
            return false; // Retourner false si la sauvegarde a échoué
        }
    }
}


?>
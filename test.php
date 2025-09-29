<?php


abstract class Base {
    abstract public function getDate(): string;
    abstract public function setDate(string $date): void;

    public function afficherBonjour(): void {
        echo "bonjour";
    }
}

class Animal extends Base {
    private string $date;

    public function getDate(): string {
        // formattage ici
        return $this->date;
    }

    public function setDate(string $date): void {
        $this->date = $date;
    }
}





interface Meuble {
    public function sasseoir();
}

class Chaise implements Meuble {
    public int $nb_pieds = 4;
    public function sasseoir() {
        echo "Vous vous asseyez sur la chaise.";
    }
}

class Tabouret extends Chaise implements Meuble {
    public int $nb_supports = 2;
    public function sasseoir() {
        echo "Vous vous asseyez sur le tabouret.";
    }
}

class Voiture implements Meuble {
    public int $nb_roues = 4;
    public function sasseoir() {
        echo "Vous vous asseyez sur le voiture.";
    }
}

// ....

class Utilisateur {
    
    public function utiliser(Meuble $meuble): void {
        $meuble->sasseoir();
    }

}





interface PaiementInterface {
    public function payer($montant): void;
    public function authenticatPaiement(): bool;
}

interface RemboursementInterface {
    public function rembourser($montant): void;
}


class Paiement {
    public float $montant = 0;

    public function payer($montant): void {
        echo "Paiement de $montant effectué.";
    }

    public function rembourser($montant): void
    {
        echo "Remboursement de $montant effectué.";
    }
}

class PaiementStripe extends Paiement implements PaiementInterface, RemboursementInterface {
    public function payer($montant): void {
        echo "Paiement de $montant effectué via Stripe.";
    }

    public function rembourser($montant): void
    {
        echo "Remboursement de $montant effectué via Stripe.";
    }

    public function authenticatPaiement(): bool
    {
        // logique d'authentification
        return true;
    }
}

class PaiementPaypal extends Paiement {
    public function payer($montant): void {
        echo "Paiement de $montant effectué via PayPal.";
    }
}

class PaiementCheque extends Paiement {
    public function payer($montant): void {
        echo "Paiement de $montant effectué via Chèque.";
    }
}

// lors de l'utilisation 
class Client {
    private Paiement $methodePaiement;

    public function __construct(Paiement $methodePaiement) {
        $this->methodePaiement = $methodePaiement;
    }

    public function effectuerPaiement($montant): void {
        $this->methodePaiement->payer($montant);
    }
}












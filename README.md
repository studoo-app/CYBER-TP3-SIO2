![separe](https://github.com/studoo-app/.github/blob/main/profile/studoo-banner-logo.png)
# CYBER TP2 SIO 3 : Tests Unitaires et Développement Piloté par les Tests (TDD)
[![Version](https://img.shields.io/badge/Version-2024-blue)]()

## Introduction aux Tests Unitaires
### Définition :
Les tests unitaires sont des tests automatisés qui permettent de vérifier que chaque unité fonctionnelle
(méthode, fonction, classe) d'une application fonctionne comme attendu. Chaque test isole une partie spécifique du code
pour détecter rapidement les erreurs.

### Avantages :

- Détection précoce des bogues.
- Prévention des régressions lors des modifications du code.
- Documentation implicite du comportement attendu.
- Amélioration de la confiance dans le déploiement du logiciel.

Les tests unitaires s’intègrent dans le cycle de développement moderne pour garantir la qualité du code,
en particulier dans les projets collaboratifs ou complexes.

### Mise en application

#### Tester une entité

Créer une entité User avec les attributs name et email, puis créer les tests unitaires pour vérifier que les attributs
sont bien initialisés.

#### Tester un service

Tester le service CalculatorService qui contient une méthode add qui prend deux entiers en paramètres
et retourne leur somme.

#### Tester un contrôleur

Tester le contrôleur HelloController qui contient une méthode hello qui prend un paramètre name et
retourne un message

#### Tester les validateurs d'une entité

Ajouter des validateurs pour l'entité User pour vérifier que le nom et l'email ne sont pas vides.
Créer les tests unitaires pour vérifier que les validateurs fonctionnent correctement.

#### Tester un repository

Créer une entité Product avec les attributs name et price.
Dans le repository ProductRepository, ajouter une méthode pour récupérer les produits dont le prix est supérieur à un montant donné.
Créer les tests unitaires pour vérifier que la méthode fonctionne correctement.

## Introduction au Développement Piloté par les Tests (TDD)
### Définition
Le Test Driven Development (TDD) est une méthodologie de développement où les tests sont écrits avant le code de production. Le cycle de développement suit trois étapes :

- Rouge : Écrire un test qui échoue.
- Vert : Écrire le minimum de code pour faire passer le test.
- Refactorisation : Nettoyer et optimiser le code.

### Avantages :
Le TDD garantit que chaque fonctionnalité est testée dès le départ.
Il améliore la conception en incitant à écrire un code simple et modulaire.

### Mise en application

#### Développer le service DiscountCalculatorService en TDD

Le service DiscountCalculatorService contient une méthode calculateDiscount qui prend un montant et un pourcentage
de réduction en paramètres et retourne le montant après réduction.

Pour ce faire, implémenter le test suivant :

```php
namespace App\Tests\Service;

use App\Service\DiscountCalculator;
use PHPUnit\Framework\TestCase;

class DiscountCalculatorTest extends TestCase
{
    public function testCalculateDiscount(): void
    {
        $calculator = new DiscountCalculator();
        $result = $calculator->calculate(200, 20); // 20% de réduction

        $this->assertEquals(160, $result);
    }

    public function testCalculateDiscountWithInvalidInput(): void
    {
        $calculator = new DiscountCalculator();

        $this->expectException(\InvalidArgumentException::class);
        $calculator->calculate(-100, 20); // Prix invalide
    }
}

```
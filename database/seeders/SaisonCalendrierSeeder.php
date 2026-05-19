<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaisonCalendrierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('saison_calendrier')->truncate();

        DB::table('saison_calendrier')->insert([

            // ── 1 : Photo seule ──────────────────────────────────────────
            [
                'numero_semaine'  => 1,
                'titre'           => 'Première vue sur la nouvelle map',
                'description'     => 'Un aperçu exclusif du monde qui vous attend en saison 7.5.',
                'date_revelation' => '2026-05-01',
                'type_contenu'    => 'photo',
                'contenu_texte'   => null,
                'contenu_url'     => 'img/testhobe.jpg',
                'contenu_image'   => null,
                'actif'           => true,
                'created_at'      => now(), 'updated_at' => now(),
            ],

            // ── 2 : Vidéo seule ──────────────────────────────────────────
            [
                'numero_semaine'  => 2,
                'titre'           => 'Trailer officiel Saison 7.5',
                'description'     => 'Le teaser tant attendu est enfin disponible.',
                'date_revelation' => '2026-05-08',
                'type_contenu'    => 'video',
                'contenu_texte'   => null,
                'contenu_url'     => 'https://www.youtube.com/watch?v=DwSnV7qzh7Y',
                'contenu_image'   => null,
                'actif'           => true,
                'created_at'      => now(), 'updated_at' => now(),
            ],

            // ── 3 : Texte court ──────────────────────────────────────────
            [
                'numero_semaine'  => 3,
                'titre'           => 'Une date de lancement confirmée',
                'description'     => 'L\'annonce que tout le monde attendait.',
                'date_revelation' => '2026-05-15',
                'type_contenu'    => 'texte',
                'contenu_texte'   => "La saison 7.5 ouvrira ses portes le 1er juillet 2026.\n\nPréparez-vous. L'aventure recommence.",
                'contenu_url'     => null,
                'contenu_image'   => null,
                'actif'           => true,
                'created_at'      => now(), 'updated_at' => now(),
            ],

            // ── 4 : Texte long ───────────────────────────────────────────
            [
                'numero_semaine'  => 4,
                'titre'           => 'Refonte complète de l\'économie',
                'description'     => 'Un grand changement pour la vie sur le serveur.',
                'date_revelation' => '2026-05-22',
                'type_contenu'    => 'texte',
                'contenu_texte'   => "Le système économique a été entièrement repensé pour la saison 7.5.\n\nChaque ville disposera désormais d'une spécialisation économique unique : agriculture, mines, commerce ou artisanat. Les échanges inter-villes seront au cœur du gameplay.\n\nUn marché central permettra de fixer les prix en temps réel selon l'offre et la demande. Les ressources rares seront limitées par zone géographique, ce qui forcera les joueurs à négocier et à établir des routes commerciales.\n\nLes guildes auront également un rôle clé : elles pourront contrôler des ressources stratégiques et dicter les prix sur certains marchés. Préparez vos coffres — les affaires vont reprendre !",
                'contenu_url'     => null,
                'contenu_image'   => null,
                'actif'           => true,
                'created_at'      => now(), 'updated_at' => now(),
            ],

            // ── 5 : Photo + Texte ────────────────────────────────────────
            [
                'numero_semaine'  => 5,
                'titre'           => 'Les nouvelles structures de ville',
                'description'     => 'Des bâtiments inédits pour enrichir vos cités.',
                'date_revelation' => '2026-05-29',
                'type_contenu'    => 'photo',
                'contenu_texte'   => "Plus de 12 nouveaux types de bâtiments font leur apparition en saison 7.5.\n\nDe la taverne au marché couvert en passant par la forge améliorée, chaque structure apporte des bonus uniques à votre ville. Certains bâtiments nécessitent une coopération entre joueurs pour être construits.",
                'contenu_url'     => 'img/testhobe.jpg',
                'contenu_image'   => null,
                'actif'           => true,
                'created_at'      => now(), 'updated_at' => now(),
            ],

            // ── 6 : Vidéo + Texte ────────────────────────────────────────
            [
                'numero_semaine'  => 6,
                'titre'           => 'Présentation du nouveau système de métiers',
                'description'     => 'Découvrez en vidéo les changements majeurs sur les métiers.',
                'date_revelation' => '2026-06-05',
                'type_contenu'    => 'video',
                'contenu_texte'   => "La vidéo présente les 8 nouveaux métiers disponibles dès le lancement de la saison 7.5.\n\nChaque métier possède désormais un arbre de compétences à débloquer progressivement. Plus vous exercez votre métier, plus vous devenez efficace et rare sur le marché.",
                'contenu_url'     => 'https://www.youtube.com/watch?v=DwSnV7qzh7Y',
                'contenu_image'   => null,
                'actif'           => true,
                'created_at'      => now(), 'updated_at' => now(),
            ],

            // ── 7 : Lien disponible ──────────────────────────────────────
            [
                'numero_semaine'  => 7,
                'titre'           => 'Formulaire de pré-inscription',
                'description'     => 'Réservez votre place pour le lancement de la saison 7.5.',
                'date_revelation' => '2026-06-12',
                'type_contenu'    => 'lien',
                'contenu_texte'   => 'Accéder au formulaire de pré-inscription',
                'contenu_url'     => 'https://discord.gg/yx3PUySCN8',
                'contenu_image'   => null,
                'actif'           => true,
                'created_at'      => now(), 'updated_at' => now(),
            ],

            // ── 8 : Lien verrouillé ──────────────────────────────────────
            [
                'numero_semaine'  => 8,
                'titre'           => 'La grande annonce de lancement',
                'description'     => 'Rejoignez le Discord pour la révélation en direct.',
                'date_revelation' => '2026-07-01',
                'type_contenu'    => 'lien',
                'contenu_texte'   => 'Rejoindre le Discord SpaziaEco',
                'contenu_url'     => 'https://discord.gg/yx3PUySCN8',
                'contenu_image'   => null,
                'actif'           => true,
                'created_at'      => now(), 'updated_at' => now(),
            ],

        ]);
    }
}

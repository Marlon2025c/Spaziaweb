<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminCommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('admin_commands')->insert([
            [
                'command' => '/inventory durability',
                'quick_command' => '/dur',
                'description' => 'Définir la durabilité de l\'objet que vous tenez. Paramètres : durability (Single)',
            ],
            [
                'command' => '/settlement rebuildcivicpowers',
                'quick_command' => '/rebuildcivicpowers',
                'description' => 'Recalcule les pouvoirs civiques pour tous les établissements et utilisateurs.',
            ],
            [
                'command' => '/culture boostsettlement',
                'quick_command' => '/boostsettlementculture',
                'description' => 'Applique un boost culturel à l\'établissement de plus bas niveau à une position donnée ou spécifiée. Paramètres : val (Single), settlement (Settlement)',
            ],
            [
                'command' => '/time set',
                'quick_command' => null,
                'description' => 'Définit l\'heure de la journée spécifiée. Paramètre : hour (Single)',
            ],
            [
                'command' => '/build evict',
                'quick_command' => '/evict',
                'description' => 'Expulse l\'utilisateur ciblé ou soi-même si aucun utilisateur n\'est ciblé. Paramètre : targetUser (User)',
            ],
            [
                'command' => '/culture boostproperty',
                'quick_command' => '/boostpropertyculture',
                'description' => 'Applique un boost culturel à une propriété donnée ou à la propriété où l\'utilisateur se trouve. Paramètres : val (Single), deed (Deed)',
            ],
            [
                'command' => '/inventory givepaint',
                'quick_command' => '/paint',
                'description' => 'Donne à l\'utilisateur de la peinture mélangée pour des couleurs prédéfinies. Paramètres : namedColorIndex (Int32), number (Int32)',
            ],
            [
                'command' => '/skills givepointsto',
                'quick_command' => null,
                'description' => 'Donne des points de compétence à un autre joueur. Paramètres : otherPlayer (User), number (Int32)',
            ],
            [
                'command' => '/world fixtrunks',
                'quick_command' => '/fixtrunks',
                'description' => 'Détruit tous les troncs en dehors du monde.',
            ],
            [
                'command' => '/world fixobjects',
                'quick_command' => '/fixobjects',
                'description' => 'Détruit tous les objets physiques avec des positions illégales en dehors du monde. Paramètre : teleportVehicles (Boolean)',
            ],
            [
                'command' => '/world clearallrubble',
                'quick_command' => '/clearallrubble',
                'description' => 'Détruit tous les débris dans le monde.',
            ],
            [
                'command' => '/weather status',
                'quick_command' => null,
                'description' => 'Affiche le statut météorologique actuel de toute la planète.',
            ],
            [
                'command' => '/weather rain',
                'quick_command' => null,
                'description' => 'Crée une légère pluie à votre position.',
            ],
            [
                'command' => '/weather heavyrain',
                'quick_command' => null,
                'description' => 'Crée une forte pluie à votre position.',
            ],
            [
                'command' => '/skills rate',
                'quick_command' => null,
                'description' => 'Affiche ou définit le multiplicateur de taux de compétence actuel. Paramètre : skillRate (Single)',
            ],
            [
                'command' => '/util fuel',
                'quick_command' => '/fuel',
                'description' => 'Remplit le véhicule actuellement sélectionné (conduit). Paramètre : target (INetObject)',
            ],
            [
                'command' => '/weather clear',
                'quick_command' => null,
                'description' => 'Supprime toutes les conditions météorologiques.',
            ],
            [
                'command' => '/sim massplant',
                'quick_command' => null,
                'description' => 'Fait apparaître une multitude d\'une plante donnée. Paramètres : radius (Int32), speciesName (String), growthPercent (Single), yield (Single), trees (Boolean)',
            ],
            [
                'command' => '/util record',
                'quick_command' => '/record',
                'description' => 'Active ou désactive le mode enregistrement.',
            ],
            [
                'command' => '/util openserverui',
                'quick_command' => '/serverui',
                'description' => 'Ouvre l\'interface utilisateur du serveur, si l\'utilisateur est local.',
            ],
            [
                'command' => '/util invisible',
                'quick_command' => null,
                'description' => 'Rends votre personnage invisible.',
            ],
            [
                'command' => '/culture replenishgivablereputation',
                'quick_command' => '/reprep',
                'description' => 'Recharge la réputation attribuable.',
            ],
            [
                'command' => '/util fly',
                'quick_command' => '/fly',
                'description' => 'Active ou désactive le mode vol.',
            ],
            [
                'command' => '/user setlastrefreshday',
                'quick_command' => '/givelastrefreshday',
                'description' => 'Change le dernier jour de rafraîchissement d\'une cible par un nombre de jours donné. Paramètres : days (Int32), target',
            ],
            [
                'command' => '/skills levelupuser',
                'quick_command' => null,
                'description' => 'Augmente le niveau d\'un citoyen d\'un. Par défaut, vous fait monter de niveau.',
            ],
            [
                'command' => '/initialspawn do',
                'quick_command' => null,
                'description' => 'Relance la sélection de spawn initiale pour l\'utilisateur donné (ou l\'utilisateur actuel si nul).',
            ],
            [
                'command' => '/user defaultexhaust',
                'quick_command' => '/defaultexhaust',
                'description' => 'Réinitialise les données d\'épuisement par défaut, comme pour un nouveau départ. Cela permettra à nouveau les bonus de première fois. Paramètre : target (User)',
            ],
            [
                'command' => '/civics makeactive',
                'quick_command' => '/makeactive',
                'description' => 'Force un citoyen donné à être dans la démographie active (soi-même si aucun n\'est passé).',
            ],
            [
                'command' => '/inventory carryall',
                'quick_command' => '/carryall',
                'description' => 'Permet de transporter des objets dans n\'importe quel emplacement d\'inventaire utilisateur et supprime la vérification du poids. Passez false pour revenir à la normale. Paramètre : allowCarryAll (Boolean)',
            ],
            [
                'command' => '/money createdebt',
                'quick_command' => null,
                'description' => 'Crée une dette entre deux joueurs dans une monnaie correspondant au nom donné. Paramètres : lender (User), borrower (User), paybackAmount (Single), interest (Single), daysTillDue (Single), currency (Currency)',
            ],
            [
                'command' => '/elections vote',
                'quick_command' => '/vote',
                'description' => 'Vote dans l\'élection donnée pour le candidat donné. Si nul est passé pour l\'élection, prend la première. Nul pour le candidat, choisit un ordre aléatoire. Nul pour le votant, utilise soi-même. Paramètres : election (Election), voteForCandidate (User), voter (User)',
            ],
            [
                'command' => '/notifications mail',
                'quick_command' => '/m',
                'description' => 'Envoie un mail à l\'utilisateur donné (ou soi-même si vide). Paramètres : text (String), targetUser (User)',
            ],
            [
                'command' => '/manage kick',
                'quick_command' => '/kick',
                'description' => 'Expulse un utilisateur. Paramètres : kickUser (User), reason (String)',
            ],
            [
                'command' => '/skills addlevelto',
                'quick_command' => '/addlevel',
                'description' => 'Ajoute des niveaux à un autre joueur. S\'ajoute à soi-même si l\'utilisateur cible est vide. Paramètres : targetUser (User), stars (Int32)',
            ],
            [
                'command' => '/titles unassign',
                'quick_command' => null,
                'description' => 'Retire un utilisateur donné d\'un titre donné, vous retire si aucun n\'est spécifié. Paramètres : title (Title), unassignUser (User)',
            ],
            [
                'command' => '/land clearrubble',
                'quick_command' => null,
                'description' => 'Nettoie les débris autour du joueur. Paramètre : radius (Single)',
            ],
            [
                'command' => '/economy payall',
                'quick_command' => '/payall',
                'description' => 'Paie tous les loyers et salaires en cours.',
            ],
            [
                'command' => '/titles setplaytimeboost',
                'quick_command' => null,
                'description' => 'Définit un "boost" qui s\'ajoutera à toutes les demandes de "temps de jeu récent" pour le joueur donné (vous-même si nul, 2 heures si non défini). Activera instantanément les joueurs si suffisamment élevé. Paramètre : hoursBoost (Single)',
            ],
            [
                'command' => '/titles set',
                'quick_command' => null,
                'description' => 'Définit les valeurs pour un titre. Paramètres : title (Title), maxOccupants (Int32)',
            ],
            [
                'command' => '/property owner',
                'quick_command' => '/owner',
                'description' => 'Change le propriétaire de l\'acte actuel. Paramètre : newOwner (User)',
            ],
            [
                'command' => '/titles rename',
                'quick_command' => null,
                'description' => 'Renomme un titre. Paramètres : title (Title), newName (String)',
            ],
            [
                'command' => '/sim repopulateanimallayer',
                'quick_command' => null,
                'description' => 'Réinitialise la population animale du simulateur aux valeurs initiales (comme lors de la génération du monde).',
            ],
            [
                'command' => '/titles giveglobalmarkerrights',
                'quick_command' => null,
                'description' => 'Autorise l\'utilisateur donné à changer tous les types de marqueurs d\'établissement du monde sans autorisation. Paramètres : settlement (Settlement), set (Boolean)',
            ],
            [
                'command' => '/titles delete',
                'quick_command' => null,
                'description' => 'Supprime définitivement un titre. Paramètre : title (Title)',
            ],
            [
                'command' => '/time skiptime',
                'quick_command' => '/st',
                'description' => 'Avance le temps d\'un nombre d\'heures donné. Paramètre : hoursToSkip (Single)',
            ],
            [
                'command' => '/pollute co2',
                'quick_command' => null,
                'description' => 'Change la quantité de CO2 (ppm) d\'un montant donné. Paramètre : ppm (Single)',
            ],
            [
                'command' => '/titles assign',
                'quick_command' => null,
                'description' => 'Assigne un utilisateur à un titre donné, ou s\'assigne soi-même si aucun utilisateur n\'est spécifié. Paramètres : title (Title), assignTo (User)',
            ],
            [
                'command' => '/initialspawn update',
                'quick_command' => null,
                'description' => 'Force la mise à jour de la position de spawn maintenant.',
            ],
            [
                'command' => '/titles clear',
                'quick_command' => null,
                'description' => 'Efface tous les occupants d\'un titre. Paramètre : title (Title)',
            ],
            [
                'command' => '/time resettime',
                'quick_command' => '/resettime',
                'description' => 'Réinitialise l\'heure de la journée pour qu\'elle corresponde à l\'horloge.',
            ],
            [
                'command' => '/time midnight',
                'quick_command' => null,
                'description' => 'Définit l\'heure de la journée à minuit.',
            ],
            [
                'command' => '/time fastforward',
                'quick_command' => '/ff',
                'description' => 'Force le monde à avancer rapidement. Passez 0 pour arrêter. Paramètre : set (Boolean)',
            ],
            [
                'command' => '/manage whitelist',
                'quick_command' => null,
                'description' => 'Affiche la liste des utilisateurs autorisés ou ajoute un utilisateur à la liste blanche par identifiant de compte, steamid, slgid ou nom d\'utilisateur. Paramètres : nameOrID (String), reason (String)',
            ],
            [
                'command' => '/manage admin',
                'quick_command' => '/admin',
                'description' => 'Affiche la liste des administrateurs ou ajoute un utilisateur en tant qu\'administrateur par identifiant de compte, steamid, slgid ou nom d\'utilisateur. Paramètres : nameOrID (String), reason (String)',
            ],
            [
                'command' => '/qa ridevehicle',
                'quick_command' => '/ride',
                'description' => 'Permet de monter dans le véhicule le plus proche.',
            ],
            [
                'command' => '/elections veto',
                'quick_command' => '/veto',
                'description' => 'Oppose un véto à une élection. Paramètre : election (Election)',
            ],
            [
                'command' => '/elections finish',
                'quick_command' => '/fin',
                'description' => 'Met fin à l\'élection spécifiée, ajoutant un vote si "true" est passé (par défaut). Si aucune élection n\'est trouvée, passe toutes les élections, y compris celles en brouillon. Paramètres : election (Election), addVote (Boolean)',
            ],
            [
                'command' => '/manage whois',
                'quick_command' => null,
                'description' => 'Affiche l\'identifiant utilisateur de l\'utilisateur demandé. Paramètre : otherUser (User)',
            ],
            [
                'command' => '/objects editobj',
                'quick_command' => null,
                'description' => 'Modifie un objet spécifique d\'un type donné. Peut être spécifié par nom ou identifiant. Paramètres : typeName (String), partialObjectNameOrId (String)',
            ],
            [
                'command' => '/settlement ignorerequirements',
                'quick_command' => '/nosetreqs',
                'description' => 'Désactive les exigences de règlement pour la session (par exemple, ne nécessite pas d\'enfants ou de citoyens pour créer un pays). Paramètre : ignore (Boolean)',
            ],
            [
                'command' => '/civics updatedems',
                'quick_command' => null,
                'description' => 'Force la mise à jour des données démographiques immédiatement.',
            ],
            [
                'command' => '/pollute air',
                'quick_command' => null,
                'description' => 'Crée une quantité donnée de pollution de l\'air en tonnes. Paramètre : tons (Single)',
            ],
            [
                'command' => '/settlement clear',
                'quick_command' => null,
                'description' => 'Détruit tous les éléments liés au règlement donné et dépossède toutes les propriétés. Paramètre : settlement (Settlement)',
            ],
            [
                'command' => '/culture masterpieces',
                'quick_command' => '/vincent',
                'description' => 'Donne une réputation à toutes les images en ignorant les limites. Peut définir un règlement pour appliquer la réputation uniquement aux images sous son influence. Paramètres : reputation (Int32), settlement (Settlement)',
            ],
            [
                'command' => '/land markglobal',
                'quick_command' => '/markglobal',
                'description' => 'Dépose un point de repère global à la position actuelle. Accepte une chaîne de texte optionnelle pour le point de repère. Paramètre : text (String)',
            ],
            [
                'command' => '/land levelwithwall',
                'quick_command' => '/levelwall',
                'description' => 'Nivele le terrain avec un mur. Paramètres : x (Int32), y (Int32), wallHeight (Int32), groundType (String), wallType (String)',
            ],
            [
                'command' => '/skills education',
                'quick_command' => null,
                'description' => 'Définit la valeur d\'éducation (de 0 à 1) pour une compétence (1 par défaut), attribue la compétence si l\'utilisateur ne l\'a pas. Si aucun utilisateur cible n\'est défini, s\'applique à soi-même. Paramètres : skillName (String), value (Single), targetUser (User)',
            ],
            [
                'command' => '/manage mute',
                'quick_command' => '/mute',
                'description' => 'Affiche la liste des utilisateurs muets ou en réduit au silence un par identifiant de compte, steamid, slgid ou nom d\'utilisateur. Muet par défaut pour toujours si le temps est vide. Format du temps : 1m, 1h, 1d, 1w. Paramètres : nameOrID (String), reason (String), time (String)',
            ],
            [
                'command' => '/money createaccount',
                'quick_command' => null,
                'description' => 'Crée un compte avec le nom spécifié. Paramètre : name (String)',
            ],
            [
                'command' => '/build spawnboat',
                'quick_command' => '/boat',
                'description' => 'Fait apparaître un bateau à la position du joueur. Paramètre : boatName (String)',
            ],
            [
                'command' => '/objects clear',
                'quick_command' => null,
                'description' => 'Supprime des objets d\'un type donné. Paramètres : typeName (String), removeActive (Boolean), removeInactive (Boolean)',
            ],
            [
                'command' => '/sim forcecollectglobalstats',
                'quick_command' => '/globalstats',
                'description' => 'Force la collecte des statistiques globales maintenant. Met à jour les statistiques de progression mondiale également.',
            ],
            [
                'command' => '/manage save',
                'quick_command' => null,
                'description' => 'Sauvegarde le monde !',
            ],
            [
                'command' => '/money deleteaccount',
                'quick_command' => null,
                'description' => 'Supprime un compte même s’il reste de la monnaie dessus.',
            ],
            [
                'command' => '/build village',
                'quick_command' => null,
                'description' => 'Fait apparaître un village.',
            ],
            [
                'command' => '/time noon',
                'quick_command' => '/noon',
                'description' => 'Régle l’heure de la journée à midi.',
            ],
            [
                'command' => '/skills all',
                'quick_command' => null,
                'description' => 'Débloque toutes les compétences.',
            ],
            [
                'command' => '/teleport toworldposition',
                'quick_command' => '/tp',
                'description' => 'Téléporte à une coordonnée xyz ou xz. Pour deux composantes, Y est calculé automatiquement.',
            ],
            [
                'command' => '/inventory dumpvehicle',
                'quick_command' => '/dumpvehicle',
                'description' => 'Vide tout le contenu de l’inventaire du véhicule.',
            ],
            [
                'command' => '/profiler everything',
                'quick_command' => null,
                'description' => 'Exécute un profilage CPU et des rapports de performance serveur, un après l’autre. La durée par défaut est de 60 secondes.',
            ],
            [
                'command' => '/teleport todark',
                'quick_command' => null,
                'description' => 'Téléporte du côté opposé du monde.',
            ],
            [
                'command' => '/teleport atob',
                'quick_command' => null,
                'description' => 'Téléporte le joueur A au joueur B.',
            ],
            [
                'command' => '/skills reset',
                'quick_command' => null,
                'description' => 'Réinitialise une spécialisation pour un joueur. Si le nom de compétence est vide, toutes les spécialisations sont réinitialisées.',
            ],
            [
                'command' => '/skills removespecialty',
                'quick_command' => '/leveldown',
                'description' => 'Supprime une spécialité qui correspond à la chaîne passée.',
            ],
            [
                'command' => '/objects enableadmininterface',
                'quick_command' => '/admininterface',
                'description' => 'Active ou désactive les interfaces d’administration dans le jeu.',
            ],
            [
                'command' => '/skills removelevelfrom',
                'quick_command' => '/removelevel',
                'description' => 'Retire des niveaux d’un autre joueur. Si l’utilisateur cible est vide, cela se fait sur soi-même.',
            ],
            [
                'command' => '/user energize',
                'quick_command' => '/energize',
                'description' => 'Accorde des heures supplémentaires à un utilisateur pour qu’il puisse effectuer du travail lorsqu’il est épuisé. Peut être négatif pour retirer de l’énergie précédemment accordée.',
            ],
            [
                'command' => '/culture updatesettlements',
                'quick_command' => '/updatesets',
                'description' => 'Force une mise à jour de toutes les propriétés des établissements.',
            ],
            [
                'command' => '/manage alert',
                'quick_command' => null,
                'description' => 'Envoie une alerte à tout le monde.',
            ],
            [
                'command' => '/skills fullreset',
                'quick_command' => null,
                'description' => 'Réinitialise toutes les compétences à non apprises.',
            ],
            [
                'command' => '/debug scanall',
                'quick_command' => '/scanall',
                'description' => 'Lance une vérification de validité de tous les objets.',
            ],
            [
                'command' => '/inventory give',
                'quick_command' => '/give',
                'description' => 'Donne un objet à soi-même.',
            ],
            [
                'command' => '/user exhaust',
                'quick_command' => '/exhaust',
                'description' => 'Force un utilisateur à être épuisé pour le reste de la journée.',
            ],
            [
                'command' => '/skills addpointsto',
                'quick_command' => '/addpoint',
                'description' => 'Accorde des points de compétence à un autre joueur. Si l’utilisateur cible est vide, cela se fait sur soi-même.',
            ],
            [
                'command' => '/sim dinnerbell',
                'quick_command' => null,
                'description' => 'Rend tous les animaux affamés.',
            ],
            [
                'command' => '/objects add',
                'quick_command' => null,
                'description' => 'Ajoute un objet du type donné.',
            ],
            [
                'command' => '/build road',
                'quick_command' => '/road',
                'description' => 'Fait apparaître une route.',
            ],
            [
                'command' => '/sim unpollute',
                'quick_command' => null,
                'description' => 'Désinfecte une zone. Enlève les plantes mortes et remplace la terre par de l’herbe.',
            ],
            [
                'command' => '/sim removedeadplants',
                'quick_command' => null,
                'description' => 'Supprime les plantes mortes dans une zone.',
            ],
            [
                'command' => '/skills cleartalents',
                'quick_command' => '/notalents',
                'description' => 'Réinitialise tous les talents pour une spécialisation pour un joueur. Si le nom de compétence est vide, tous les talents de toutes les spécialisations sont supprimés.',
            ],
            [
                'command' => '/inventory dumpall',
                'quick_command' => '/dumpall',
                'description' => 'Vide tout l’inventaire.',
            ],
            [
                'command' => '/settlement addclaimpapers',
                'quick_command' => null,
                'description' => 'Ajoute la quantité spécifiée de papiers de revendication à l’établissement spécifié.',
            ],
            [
                'command' => '/build stockpile',
                'quick_command' => null,
                'description' => 'Fait apparaître un stockpile contenant des piles des objets listés.',
            ],
            [
                'command' => '/manage unwhitelist',
                'quick_command' => null,
                'description' => 'Retire un utilisateur de la liste blanche par identifiant de compte, steamid, slgid, ou nom d’utilisateur.',
            ],
            [
                'command' => '/settlement addclaimstakes',
                'quick_command' => null,
                'description' => 'Ajoute la quantité spécifiée de piquets de revendication à l’établissement spécifié.',
            ],
            [
                'command' => '/money setaccountowner',
                'quick_command' => null,
                'description' => 'Définit manuellement le créateur d’un compte.',
            ],
            [
                'command' => '/sim spawnanimal',
                'quick_command' => '/animal',
                'description' => 'Fait apparaître un nombre d’animaux.',
            ],
            [
                'command' => '/inventory givepaintrgb',
                'quick_command' => '/paintrgb',
                'description' => 'Donne de la peinture mélangée avec une couleur RGB.',
            ],
            [
                'command' => '/sim spawnalltrees',
                'quick_command' => '/alltrees',
                'description' => 'Fait apparaître des arbres de différentes âges en ligne.',
            ],
            [
                'command' => '/inventory giveall',
                'quick_command' => '/giveall',
                'description' => 'Donne tous les objets correspondant à la recherche donnée.',
            ],
            [
                'command' => '/property boostdeed',
                'quick_command' => '/boostdeed',
                'description' => 'Augmente la valeur d’un acte de propriété donné, ou l’acte de la position actuelle si non spécifié.',
            ],
            [
                'command' => '/sim trample',
                'quick_command' => null,
                'description' => 'Piétine le sol autour.',
            ],
            [
                'command' => '/sim letitfish',
                'quick_command' => '/fish',
                'description' => 'C’est l’heure de la pêche !',
            ],
            [
                'command' => '/civics whitelistdemographic',
                'quick_command' => '/adddems',
                'description' => 'Force un citoyen à toujours faire partie d\'un groupe démographique donné, même s\'il ne correspond pas aux conditions.',
            ],
            [
                'command' => '/property add',
                'quick_command' => null,
                'description' => 'Ajoute l\'utilisateur à l\'acte actuel (si le nom d\'utilisateur n\'est pas fourni, l\'utilisateur actuel est ajouté).',
            ],
            [
                'command' => '/objects edit',
                'quick_command' => '/edit',
                'description' => 'Ouvre un affichage pour modifier n\'importe quel objet d\'enregistrement ou limiter à un type donné.',
            ],
            [
                'command' => '/skills removepointsfrom',
                'quick_command' => '/removepoint',
                'description' => 'Retire des points de compétence à un autre joueur. Retire de soi-même si l\'utilisateur cible est vide.',
            ],
            [
                'command' => '/property unclaimabandoned',
                'quick_command' => null,
                'description' => 'Désinscrit les parcelles dans le monde où le propriétaire ne s\'est pas connecté depuis X jours.',
            ],
            [
                'command' => '/land level',
                'quick_command' => '/level',
                'description' => 'Nivele le terrain.',
            ],
            [
                'command' => '/property ownnone',
                'quick_command' => null,
                'description' => 'Révoque votre propriété.',
            ],
            [
                'command' => '/qa spawn',
                'quick_command' => '/spawn',
                'description' => 'Fait apparaître un objet dans un bâtiment.',
            ],
            [
                'command' => '/sim killtrees',
                'quick_command' => '/killtrees',
                'description' => 'Tue tous les arbres dans une zone. Passe à false pour les couper uniquement.',
            ],
            [
                'command' => '/sim regenlayer',
                'quick_command' => null,
                'description' => 'Régénère une couche du monde, la restaurant à l\'état qu\'elle aurait si le monde venait d\'être généré.',
            ],
            [
                'command' => '/sim killplants',
                'quick_command' => '/killplants',
                'description' => 'Tue toutes les plantes dans une zone. Passe à false pour ne pas les supprimer.',
            ],
            [
                'command' => '/elections forcerecalc',
                'quick_command' => '/recalcelec',
                'description' => 'Force la recalcul des élections.',
            ],
            [
                'command' => '/objects forceenablenearestobject',
                'quick_command' => '/fe',
                'description' => 'Force le plus proche objet à ignorer toutes ses exigences et à toujours être activé.',
            ],
            [
                'command' => '/build buildingofmaterial',
                'quick_command' => '/bm',
                'description' => 'Fait apparaître un bâtiment en spécifiant le matériau à utiliser.',
            ],
            [
                'command' => '/sim cleardebris',
                'quick_command' => '/cleardebris',
                'description' => 'Supprime les débris dans une zone.',
            ],
            [
                'command' => '/meteor spawn',
                'quick_command' => null,
                'description' => 'Fait apparaître un météore en orbite, quelle que soit la configuration actuelle du désastre.',
            ],
            [
                'command' => '/inventory addvoid',
                'quick_command' => null,
                'description' => 'Ajoute un objet à votre stockage de vide.',
            ],
            [
                'command' => '/skills give',
                'quick_command' => null,
                'description' => 'Donne une compétence correspondant au nom donné. Si aucun utilisateur cible n\'est défini, l\'applique à soi-même.',
            ],
            [
                'command' => '/manage clearmaintenance',
                'quick_command' => null,
                'description' => 'Efface la maintenance utilisateur actuellement programmée.',
            ],
            [
                'command' => '/objects remove',
                'quick_command' => null,
                'description' => 'Supprime un objet spécifique. Peut être spécifié par nom ou ID.',
            ],
            [
                'command' => '/settlement reset',
                'quick_command' => '/resettle',
                'description' => 'Réinitialise toutes les entrées invalides dans une colonie à une nouvelle valeur par défaut.',
            ],
            [
                'command' => '/manage unmute',
                'quick_command' => '/unmute',
                'description' => 'Désactive le silence d\'un utilisateur par identifiant de compte, steamid, slgid, ou nom d\'utilisateur.',
            ],
            [
                'command' => '/property resolveoverburdened',
                'quick_command' => '/overb',
                'description' => 'Désinscrit immédiatement les parcelles d\'une propriété surchargée.',
            ],
            [
                'command' => '/property unlimitedclaim',
                'quick_command' => '/unlimitedclaim',
                'description' => 'Permet au premier outil de revendication trouvé dans la barre d\'outils de revendiquer sans nécessiter les papiers de revendication.',
            ],
            [
                'command' => '/money steamsale',
                'quick_command' => '/gabe',
                'description' => 'Donne de l\'argent à chaque joueur.',
            ],
            [
                'command' => '/settlement forcerenouncecitizenship',
                'quick_command' => '/nocit',
                'description' => 'Fait quitter un citoyen à une colonie.',
            ],
            [
                'command' => '/settlement enabledisable ',
                'quick_command' => '/seten',
                'description' => 'Active ou désactive une colonie. Cela arrête l\'influence ou l\'application des lois lorsque désactivée.',
            ],
            [
                'command' => '/settlement populate',
                'quick_command' => '/populate',
                'description' => 'Remplit la ville de citoyens.',
            ],
            [
                'command' => '/settlement clearall',
                'quick_command' => '/cleartowns',
                'description' => 'Détruit toutes les villes et les balises de propriété et désinscrit toutes les propriétés.',
            ],
            [
                'command' => '/sim setlayer',
                'quick_command' => null,
                'description' => 'Définit une couche du monde sur une valeur spécifique ou une valeur aléatoire dans une plage.',
            ],
            [
                'command' => '/teleport toplayer',
                'quick_command' => '/tpto',
                'description' => 'Téléporte vers un citoyen.',
            ],
            [
                'command' => '/elections win',
                'quick_command' => null,
                'description' => 'Force la victoire d\'une élection, soit avec le candidat spécifié, soit "oui" dans une élection binaire.',
            ],
            [
                'command' => '/land removenearestglobalmark',
                'quick_command' => '/removenearestglobalmark',
                'description' => 'Supprime le repère mondial le plus proche de votre position actuelle.',
            ],
            [
                'command' => '/money addaccountuser',
                'quick_command' => null,
                'description' => 'Ajoute un utilisateur au compte bancaire avec l\'ID spécifié.',
            ],
            [
                'command' => '/land resetworldcaches',
                'quick_command' => null,
                'description' => 'Réinitialise les caches du monde.',
            ],
            [
                'command' => '/chat clearhistoryolderthan',
                'quick_command' => null,
                'description' => 'Nettoie l\'historique des chats des anciens messages.',
            ],
            [
                'command' => '/sim oneshot',
                'quick_command' => null,
                'description' => 'Tue l\'animal le plus proche.',
            ],
            [
                'command' => '/districts add',
                'quick_command' => null,
                'description' => 'Définit la zone actuelle dans un rayon donné à un district donné.',
            ],
            [
                'command' => '/sim spawnallplants',
                'quick_command' => '/allplants',
                'description' => 'Fait apparaître des plantes de différents âges en série.',
            ],
            [
                'command' => '/objects editbyid',
                'quick_command' => null,
                'description' => 'Modifie l\'objet spécifié par ID.',
            ],
            [
                'command' => '/property unclaim',
                'quick_command' => '/unclaim',
                'description' => 'Désinscrit la parcelle sur laquelle vous vous tenez.',
            ],
            [
                'command' => '/property turnon',
                'quick_command' => '/on',
                'description' => 'Active les objets dans un rayon donné.',
            ],
            [
                'command' => '/property targetowner',
                'quick_command' => '/ownit',
                'description' => 'Change le propriétaire de l\'objet ciblé.',
            ],
            [
                'command' => '/manage maintenance',
                'quick_command' => null,
                'description' => 'Planifie un arrêt automatique.',
            ],
            [
                'command' => '/build resident',
                'quick_command' => '/res',
                'description' => 'Fait du joueur ciblé un résident de l\'acte à votre position actuelle.',
            ],
            [
                'command' => '/profiler nettrace',
                'quick_command' => null,
                'description' => 'Lance un profilage CPU utilisant nettrace.',
            ],
            [
                'command' => '/meteor addhours',
                'quick_command' => null,
                'description' => 'Ajoute des heures d\'impact de météore.',
            ],
            [
                'command' => '/manage removeadmin',
                'quick_command' => null,
                'description' => 'Supprime un utilisateur des administrateurs.',
            ],
            [
                'command' => '/elections clearold',
                'quick_command' => null,
                'description' => 'Supprime l\'historique d\'une élection spécifique.',
            ],
            [
                'command' => '/property removedeed',
                'quick_command' => null,
                'description' => 'Supprime l\'acte spécifié ou celui sur lequel vous vous tenez.',
            ],
            [
                'command' => '/inventory dumpcarried',
                'quick_command' => '/dumpcarried',
                'description' => 'Dépose tous les objets portés.',
            ],
            [
                'command' => '/property ownall',
                'quick_command' => null,
                'description' => 'Revendiquer toutes les propriétés.',
            ],
            [
                'command' => '/manage clearobjective',
                'quick_command' => null,
                'description' => 'Efface l\'objectif d\'un utilisateur.',
            ],
            [
                'command' => '/meteor makevisible',
                'quick_command' => null,
                'description' => 'Rend le météore visible dans la portée ciblable.',
            ],
            [
                'command' => '/settlement annex',
                'quick_command' => '/annex',
                'description' => 'Force une colonie à annexer une autre.',
            ],
            [
                'command' => '/profiler results',
                'quick_command' => null,
                'description' => 'Ouvre la page des résultats dans le navigateur.',
            ],
            [
                'command' => '/profiler memory',
                'quick_command' => null,
                'description' => 'Collecte une capture de mémoire.',
            ],
            [
                'command' => '/profiler cpu',
                'quick_command' => null,
                'description' => 'Lance un profilage CPU utilisant dottrace.',
            ],
            [
                'command' => '/skills removetalent',
                'quick_command' => '/talentdel',
                'description' => 'Retire un talent par nom pour un joueur.',
            ],
            [
                'command' => '/land clearpaint',
                'quick_command' => null,
                'description' => 'Supprime la peinture dans la zone autour du joueur. Max = 20.',
            ],
            [
                'command' => '/rooms repairall',
                'quick_command' => null,
                'description' => 'Répare toutes les pièces endommagées. Cette commande peut prendre du temps et engendrer une lourde charge sur le serveur.',
            ],
            [
                'command' => '/pollute trashcity',
                'quick_command' => null,
                'description' => 'Crée la ville de déchets.',
            ],
            [
                'command' => '/districts clearmap',
                'quick_command' => null,
                'description' => 'Supprime tous les districts d’une carte donnée.',
            ],
            [
                'command' => '/world species',
                'quick_command' => null,
                'description' => 'Affiche les clusters de spawn initiaux des espèces.',
            ],
            [
                'command' => '/food eat',
                'quick_command' => '/eat',
                'description' => 'Maximiser vos calories.',
            ],
            [
                'command' => '/pollute all',
                'quick_command' => null,
                'description' => 'Fait pleuvoir des déchets pour détruire le monde.',
            ],
            [
                'command' => '/money addaccountmanager',
                'quick_command' => null,
                'description' => 'Ajoute un utilisateur en tant que manager pour un compte bancaire avec ID.',
            ],
            [
                'command' => '/performance',
                'quick_command' => null,
                'description' => 'Lance des rapports de performance du serveur et les sauvegarde dans des fichiers.',
            ],
            [
                'command' => '/objects removebyid',
                'quick_command' => null,
                'description' => 'Supprime l’objet avec l’ID spécifié.',
            ],
            [
                'command' => '/sim greenthumb',
                'quick_command' => null,
                'description' => 'Fait apparaître des plantes au hasard.',
            ],
            [
                'command' => '/civics makeabandoned',
                'quick_command' => '/makeabandoned',
                'description' => 'Force un citoyen à être dans la catégorie abandonnée.',
            ],
            [
                'command' => '/money cancelalldebtfromplayer',
                'quick_command' => null,
                'description' => 'Annule la dette accumulée par un joueur.',
            ],
            [
                'command' => '/inventory forcegive',
                'quick_command' => '/fgive',
                'description' => 'Donne un objet sans restriction.',
            ],
            [
                'command' => '/money removeaccountmanager',
                'quick_command' => null,
                'description' => 'Supprime un utilisateur en tant que manager du compte bancaire.',
            ],
            [
                'command' => '/qa showsupportedlanguages',
                'quick_command' => null,
                'description' => 'Affiche toutes les langues prises en charge avec leurs codes.',
            ],
            [
                'command' => '/food work',
                'quick_command' => '/work',
                'description' => 'Dépense des calories.',
            ],
            [
                'command' => '/meteor destroy',
                'quick_command' => null,
                'description' => 'Détruit le météore en orbite.',
            ],
            [
                'command' => '/property removeemptydeeds',
                'quick_command' => null,
                'description' => 'Supprime les actes vides.',
            ],
            [
                'command' => '/settlement allowadminannex',
                'quick_command' => '/freeannex',
                'description' => 'Active ou désactive la possibilité pour les admins d’annexer des propriétés même si les conditions ne sont pas remplies.',
            ],
            [
                'command' => '/manage listusers',
                'quick_command' => null,
                'description' => 'Affiche la liste de tous les utilisateurs connus, avec leur nom d’utilisateur et leur ID.',
            ],
            [
                'command' => '/manage warnuser',
                'quick_command' => null,
                'description' => 'Envoie un avertissement à un citoyen.',
            ],
            [
                'command' => '/sim spawnplant',
                'quick_command' => '/plant',
                'description' => 'Fait apparaître une ou plusieurs plantes dans une rangée ou une grille.',
            ],
            [
                'command' => '/settlement recountclaims',
                'quick_command' => null,
                'description' => 'Force un recensement et une mise à jour des réclamations pour chaque colonie.',
            ],
            [
                'command' => '/manage unban',
                'quick_command' => '/unban',
                'description' => 'Débanit un utilisateur par ID de compte, steamid, slgid, ou nom d’utilisateur.',
            ],
            [
                'command' => '/culture givereputation',
                'quick_command' => '/rep',
                'description' => 'Donne de la réputation d’un utilisateur vers un autre utilisateur ou une image.',
            ],
            [
                'command' => '/land levelcentered',
                'quick_command' => '/levelcentered',
                'description' => 'Nivele le terrain autour de l’utilisateur.',
            ],
            [
                'command' => '/manage announce',
                'quick_command' => null,
                'description' => 'Envoie une annonce à tous les joueurs.',
            ],
            [
                'command' => '/property remove',
                'quick_command' => null,
                'description' => 'Supprime un utilisateur d’un acte.',
            ],
            [
                'command' => '/world clearfallentrees',
                'quick_command' => '/clearfallentrees',
                'description' => 'Supprime les arbres tombés.',
            ],
            [
                'command' => '/elections fail',
                'quick_command' => null,
                'description' => 'Lance un vote négatif et met fin à une élection.',
            ],
            [
                'command' => '/land removeallbut',
                'quick_command' => '/removeallbut',
                'description' => 'Supprime tous les types de blocs sauf le spécifié.',
            ],
            [
                'command' => '/money removeaccountuser',
                'quick_command' => null,
                'description' => 'Supprime un utilisateur d’un compte bancaire.',
            ],
            [
                'command' => '/civics ticknow',
                'quick_command' => null,
                'description' => 'Force un tour du système civique à se produire immédiatement.',
            ],
            [
                'command' => '/land remove',
                'quick_command' => '/remove',
                'description' => 'Supprime des blocs d’une zone spécifiée.',
            ],
            [
                'command' => '/manage ban',
                'quick_command' => '/ban',
                'description' => 'Liste les utilisateurs bannis ou bannit un utilisateur.',
            ],
            [
                'command' => '/land spawnrubble',
                'quick_command' => null,
                'description' => 'Fait pleuvoir des débris autour du joueur.',
            ],
            [
                'command' => '/network setpassword',
                'quick_command' => null,
                'description' => 'Définit le mot de passe du serveur.',
            ],
            [
                'command' => '/build building',
                'quick_command' => '/bt',
                'description' => 'Fait apparaître un bâtiment en spécifiant le niveau.',
            ],
            [
                'command' => '/civics blacklistdemographic',
                'quick_command' => '/removedems',
                'description' => 'Supprime un citoyen d’une catégorie démographique.',
            ],
            [
                'command' => '/inventory dumpselected',
                'quick_command' => '/dumpselected',
                'description' => 'Vider tous les objets de l’emplacement de la barre d’outils sélectionnée.',
            ],
            [
                'command' => '/teleport targetto',
                'quick_command' => null,
                'description' => 'Téléporte un joueur à des coordonnées XYZ.',
            ],
            [
                'command' => '/culture describeannex',
                'quick_command' => '/describeannex',
                'description' => 'Met à jour les paramètres d’annexion et les décrit.',
            ],
            [
                'command' => '/manage setspawn',
                'quick_command' => null,
                'description' => 'Change la localisation du spawn pour la position actuelle.',
            ],
            [
                'command' => '/civics debug',
                'quick_command' => null,
                'description' => 'Affiche des informations de débogage sur le traitement civique.',
            ],
            [
                'command' => '/craft setpartdecaymult',
                'quick_command' => '/partdecay',
                'description' => 'Modifie la vitesse de dégradation des objets dans un rayon donné.',
            ],
            [
                'command' => '/food crave',
                'quick_command' => '/crave',
                'description' => 'Force un utilisateur à avoir une envie de nourriture.',
            ],
            [
                'command' => '/elections createpoll',
                'quick_command' => '/poll',
                'description' => 'Ouvre un dialogue pour commencer un sondage.',
            ],
            [
                'command' => '/property claimrect',
                'quick_command' => '/claim',
                'description' => 'Réclame des parcelles dans un rectangle donné.',
            ],
            [
                'command' => '/skills levelup',
                'quick_command' => '/levelup',
                'description' => 'Monte un skill au maximum.',
            ],

        ]);
    }
}

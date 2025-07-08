<?php
require_once 'vendor/autoload.php';
use PhpOffice\PhpWord\TemplateProcessor;

class Attestation {

    public static function generate($employe, $nomRh,$type = 'attestationSalaire') {
        // Choisir le template
        switch ($type) {
            case 'attestationSalaire':
                $templatePath = 'uploads/attestationTemplates/attestationSalaire.docx';
                break;
            case 'certificatTravail':
                $templatePath = 'uploads/attestationTemplates/certificatTravail.docx';
                break;
            case 'domiciliationSalaire':
                $templatePath = 'uploads/attestationTemplates/domiciliationSalaire.docx';
                break;
            default:
                throw new Exception('Type d’attestation invalide.');
        }

        $template = new TemplateProcessor($templatePath);

        // Variables communes
        $template->setValue('nom', $employe['nom']);
        $template->setValue('prenom', $employe['prenom']);
        $template->setValue('CIN', $employe['CIN']);
        $template->setValue('NUMCNSS', $employe['NUMCNSS']);
        $template->setValue('fonctionService', $employe['fonctionService']);
        $template->setValue('dateEmbauche', $employe['dateEmbauche']);
        $template->setValue('nomRH', $nomRh);
        $date = date('d/m/Y');
        $template->setValue('dateCreation', $date);

        // Variables spécifiques
        if ($type === 'attestationSalaire') {
            $template->setValue('salaire', $employe['salaireHeure']);
        } elseif ($type === 'certificatTravail') {
            $template->setValue('dateRetrait_Démission', $employe['dateRetrait_Démission']);
        } elseif ($type === 'domiciliationSalaire') {
            $template->setValue('Banque', $employe['Banque']);
            $template->setValue('numCompte', $employe['numCompte']);
        }

        // Nom du fichier
        $fileName = "Attestation_" . $type . "_" . $employe['nom'] . ".docx";
        $template->saveAs($fileName);

        return $fileName;
    }
}

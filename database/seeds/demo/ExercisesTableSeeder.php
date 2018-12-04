<?php

use Illuminate\Database\Seeder;

class ExercisesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('exercises')->delete();
        
        \DB::table('exercises')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Opdracht 1 - Wat is normalisatie?',
                'course_id' => 1,
                'content' => '<div class="freebirdFormviewerViewItemsItemItemHeader">
<div class="freebirdFormviewerViewItemsItemItemTitleContainer">
<div class="freebirdFormviewerViewItemsItemItemTitle exportItemTitle freebirdCustomFont" dir="auto" role="heading" aria-level="2" aria-describedby="i.desc.1872410917 i2 i4">&nbsp;</div>
<div class="freebirdFormviewerViewItemsItemItemTitle exportItemTitle freebirdCustomFont" dir="auto" role="heading" aria-level="2" aria-describedby="i.desc.1872410917 i2 i4">Beantwoord de vragen. Er is altijd een antwoord het beste.</div>
<div class="freebirdFormviewerViewItemsItemItemTitle exportItemTitle freebirdCustomFont" dir="auto" role="heading" aria-level="2" aria-describedby="i.desc.1872410917 i2 i4">&nbsp;</div>
<div class="freebirdFormviewerViewItemsItemItemTitle exportItemTitle freebirdCustomFont" dir="auto" role="heading" aria-level="2" aria-describedby="i.desc.1872410917 i2 i4"><span style="color: #ff0000;"><strong>Kopie&euml;r per vraag de vraag en het beste antwoord en plak deze in het antwoordveld hieronder.</strong></span></div>
<div class="freebirdFormviewerViewItemsItemItemTitle exportItemTitle freebirdCustomFont" dir="auto" role="heading" aria-level="2" aria-describedby="i.desc.1872410917 i2 i4">&nbsp;</div>
<div id="i1" class="freebirdFormviewerViewItemsItemItemTitle exportItemTitle freebirdCustomFont" dir="auto" role="heading" aria-level="2" aria-describedby="i.desc.1872410917 i2 i4"><strong>Hoeveel applicaties kunnen gebruik maken van dezelfde database?&nbsp;</strong></div>
</div>
</div>
<div data-input="L9xHkb">
<div role="radiogroup" aria-labelledby="i1" aria-describedby="i.desc.1872410917 i.err.1872410917" aria-required="true" aria-invalid="false">
<div class="">
<div class="exportLabelWrapper">&nbsp;</div>
</div>
</div>
</div>
<div class="exportLabelWrapper">
<div class="docssharedWizToggleLabeledContent">
<ul>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Altijd 1 applicatie tegelijk</span></li>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Minimaal 2 applicaties tegelijk</span></li>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Maximaal 1 applicatie</span></li>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Heel veel, maar ik weet niet hoeveel precies</span></li>
</ul>
<p><strong>Moet je voor elke database normaliseren? </strong></p>
<div class="exportLabelWrapper">
<div class="docssharedWizToggleLabeledContent">
<ul>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Ja, anders ontwikkel je geen goede database<br /></span></li>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Nee, als de database maar werkt</span></li>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Nee, dat is afhankelijk van het RDBMS dat je gebruikt</span></li>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Ja, want zonder dat werkt een RDBMS niet goed<br /></span></li>
</ul>
<p><strong><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Wat is het resultaat van normalisatie?</span></strong></p>
<ul>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">In database komt minder redundantie voor</span></li>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Redundante gegevens in de database worden niet op schijf geplaatst</span></li>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">Er komen minder gegevens in de database voor</span></li>
<li class="docssharedWizToggleLabeledPrimaryText"><span class="docssharedWizToggleLabeledLabelText exportLabel freebirdFormviewerViewItemsRadioLabel" dir="auto">De database moet opnieuw ontwikkeld worden</span></li>
</ul>
</div>
</div>
</div>
</div>',
                'is_final' => 0,
                'level_id' => 1,
                'created_at' => '2018-11-29 11:05:46',
                'updated_at' => '2018-12-03 10:02:54',
                'is_first' => 1,
                'next_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Opdracht 2 - Het maken van een lijst met gegevens',
                'course_id' => 1,
                'content' => '<p>Maak van het volgende overzicht een lijst met gegevens op de manier zoals in de filmpjes is getoond. In het overzicht komen samgestelde gegevens voor en natuurlijke elementaire gegevens, constante gegevensen procesgegevens. Deze gegevens komen dus ook in je lijst met gegevens voor. <br /><strong><span style="color: #ff0000;">Upload het bestand en zet je naam en studentnummer in het antwoordveld.</span> </strong></p>
<p><strong>Commissie: Materiaalcommissie</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Naam</strong></td>
<td style="width: 50%;"><strong>Telefoonnummer</strong></td>
</tr>
<tr>
<td style="width: 50%;">J. Jansen</td>
<td style="width: 50%;">036-3568912</td>
</tr>
<tr>
<td style="width: 50%;">F. van Bosch</td>
<td style="width: 50%;">06-98653214</td>
</tr>
<tr>
<td style="width: 50%;">M. Mathijsen</td>
<td style="width: 50%;">0320-827364</td>
</tr>
<tr>
<td style="width: 50%;">M. H. Abdelkader</td>
<td style="width: 50%;">06-19283765</td>
</tr>
<tr>
<td style="width: 50%;">T. Mobile</td>
<td style="width: 50%;">06-61278394</td>
</tr>
<tr>
<td style="width: 50%;">Jessie K.</td>
<td style="width: 50%;">0320-445566</td>
</tr>
<tr>
<td style="width: 50%;"><strong>Totaal aantal leden</strong></td>
<td style="width: 50%;"><strong>6</strong></td>
</tr>
</tbody>
</table>',
                'is_final' => 0,
                'level_id' => 1,
                'created_at' => '2018-11-29 12:15:41',
                'updated_at' => '2018-11-29 12:56:58',
                'is_first' => 0,
                'next_id' => 3,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Opdracht 4 - het maken van de nulde en eerste normaalvorm',
                'course_id' => 1,
                'content' => '<div class="ktcYN">
<div class="nGi02b lziZub">
<div class="J5AvUe">
<div class="IMvYId cfaOwb">
<div class="kRYv9b YVvGBb">
<div class="J5AvUe">
<div class="kRYv9b YVvGBb">
<div class="J5AvUe">
<div class="IMvYId cfaOwb">
<div class="kRYv9b YVvGBb">Maak van het volgende overzicht en de lijst met gegevens de nulde en eerste normaalvorm op de manier zoals in<br />de filmpjes is getoond.</div>
<div class="kRYv9b YVvGBb">&nbsp;</div>
<div class="kRYv9b YVvGBb"><strong><span style="color: #ff0000;">Upload het bestand en zet je naam en studentnummer in het antwoordveld. </span></strong></div>
<div class="kRYv9b YVvGBb">
<p><strong>Commissie: Materiaalcommissie</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Naam</strong></td>
<td style="width: 50%;"><strong>Telefoonnummer</strong></td>
</tr>
<tr>
<td style="width: 50%;">J. Jansen</td>
<td style="width: 50%;">036-3568912</td>
</tr>
<tr>
<td style="width: 50%;">F. van Bosch</td>
<td style="width: 50%;">06-98653214</td>
</tr>
<tr>
<td style="width: 50%;">M. Mathijsen</td>
<td style="width: 50%;">0320-827364</td>
</tr>
<tr>
<td style="width: 50%;">M. H. Abdelkader</td>
<td style="width: 50%;">06-19283765</td>
</tr>
<tr>
<td style="width: 50%;">T. Mobile</td>
<td style="width: 50%;">06-61278394</td>
</tr>
<tr>
<td style="width: 50%;">Jessie K.</td>
<td style="width: 50%;">0320-445566</td>
</tr>
<tr>
<td style="width: 50%;"><strong>Totaal aantal leden</strong></td>
<td style="width: 50%;"><strong>6</strong></td>
</tr>
</tbody>
</table>
<p><strong>Lijst met gegevens</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Eigenschap</strong></td>
<td style="width: 50%;"><strong>Soort gegeven</strong></td>
</tr>
<tr>
<td style="width: 50%;">Commissie (titel)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Commissienaam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Naam (kolomkop)</td>
<td style="width: 50%;">Samengesteld gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Naam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Voorletters</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Tussenvoegsel</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Achternaam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Telefoon (kolomkop)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Telefoonnummer</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Totaal (label)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Aantal</td>
<td style="width: 50%;">Procesgegeven</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>',
                'is_final' => 0,
                'level_id' => 1,
                'created_at' => '2018-11-29 12:56:58',
                'updated_at' => '2018-12-03 10:04:54',
                'is_first' => 0,
                'next_id' => 4,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Opdracht 5 - het maken van de tweede normaalvorm',
                'course_id' => 1,
                'content' => '<p>Maak van het volgende overzicht, de lijst met gegevens, de nulde en eerste normaalvorm de tweede normaalvorm<br />op de manier zoals in de filmpjes is getoond.</p>
<p><strong><span style="color: #ff0000;">Upload het bestand en zet je naam en studentnummer in het antwoordveld. </span></strong></p>
<p><strong>Commissie: Materiaalcommissie</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Naam</strong></td>
<td style="width: 50%;"><strong>Telefoonnummer</strong></td>
</tr>
<tr>
<td style="width: 50%;">J. Jansen</td>
<td style="width: 50%;">036-3568912</td>
</tr>
<tr>
<td style="width: 50%;">F. van Bosch</td>
<td style="width: 50%;">06-98653214</td>
</tr>
<tr>
<td style="width: 50%;">M. Mathijsen</td>
<td style="width: 50%;">0320-827364</td>
</tr>
<tr>
<td style="width: 50%;">M. H. Abdelkader</td>
<td style="width: 50%;">06-19283765</td>
</tr>
<tr>
<td style="width: 50%;">T. Mobile</td>
<td style="width: 50%;">06-61278394</td>
</tr>
<tr>
<td style="width: 50%;">Jessie K.</td>
<td style="width: 50%;">0320-445566</td>
</tr>
<tr>
<td style="width: 50%;"><strong>Totaal aantal leden</strong></td>
<td style="width: 50%;"><strong>6</strong></td>
</tr>
</tbody>
</table>
<p><strong>Lijst met gegevens</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Eigenschap</strong></td>
<td style="width: 50%;"><strong>Soort gegeven</strong></td>
</tr>
<tr>
<td style="width: 50%;">Commissie (titel)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Commissienaam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Naam (kolomkop)</td>
<td style="width: 50%;">Samengesteld gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Naam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Voorletters</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Tussenvoegsel</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Achternaam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Telefoon (kolomkop)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Telefoonnummer</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Totaal (label)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Aantal</td>
<td style="width: 50%;">Procesgegeven</td>
</tr>
</tbody>
</table>
<p>0e Normaalvorm<br />Commissieid, Commissienaam, RG(lidid, voorletters, tussenvoegsel, achternaam, telefoon)</p>
<p>1e Normaalvorm<br />Commissieid, commissienaam<br />Commissieid, lidid, voorletters, tussenvoegsel, achternaam, telefoon</p>',
                'is_final' => 0,
                'level_id' => 1,
                'created_at' => '2018-11-29 13:30:53',
                'updated_at' => '2018-11-29 13:40:03',
                'is_first' => 0,
                'next_id' => 5,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Opdracht 6 - het maken van de derde normaalvorm',
                'course_id' => 1,
                'content' => '<p>Maak van het volgende overzicht, de lijst met gegevens, de nulde, de eerste en tweede normaalvorm de derde<br />normaalvorm op de manier zoals in de filmpjes is getoond.</p>
<p><strong><span style="color: #ff0000;">Upload het bestand en zet je naam en studentnummer in het antwoordveld. </span></strong></p>
<p><strong>Commissie: Materiaalcommissie</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Naam</strong></td>
<td style="width: 50%;"><strong>Telefoonnummer</strong></td>
</tr>
<tr>
<td style="width: 50%;">J. Jansen</td>
<td style="width: 50%;">036-3568912</td>
</tr>
<tr>
<td style="width: 50%;">F. van Bosch</td>
<td style="width: 50%;">06-98653214</td>
</tr>
<tr>
<td style="width: 50%;">M. Mathijsen</td>
<td style="width: 50%;">0320-827364</td>
</tr>
<tr>
<td style="width: 50%;">M. H. Abdelkader</td>
<td style="width: 50%;">06-19283765</td>
</tr>
<tr>
<td style="width: 50%;">T. Mobile</td>
<td style="width: 50%;">06-61278394</td>
</tr>
<tr>
<td style="width: 50%;">Jessie K.</td>
<td style="width: 50%;">0320-445566</td>
</tr>
<tr>
<td style="width: 50%;"><strong>Totaal aantal leden</strong></td>
<td style="width: 50%;"><strong>6</strong></td>
</tr>
</tbody>
</table>
<p><strong>Lijst met gegevens</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Eigenschap</strong></td>
<td style="width: 50%;"><strong>Soort gegeven</strong></td>
</tr>
<tr>
<td style="width: 50%;">Commissie (titel)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Commissienaam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Naam (kolomkop)</td>
<td style="width: 50%;">Samengesteld gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Naam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Voorletters</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Tussenvoegsel</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Achternaam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Telefoon (kolomkop)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Telefoonnummer</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Totaal (label)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Aantal</td>
<td style="width: 50%;">Procesgegeven</td>
</tr>
</tbody>
</table>
<p><strong>0e Normaalvorm</strong><br />Commissieid, Commissienaam, RG(lidid, voorletters, tussenvoegsel, achternaam, telefoon)</p>
<p><strong>1e Normaalvorm</strong><br />Commissieid, commissienaam<br />Commissieid, lidid, voorletters, tussenvoegsel, achternaam, telefoon<br /><br /><strong>2e Normaalvorm</strong><br />Commissieid, commissienaam<br />Commissieid, lidid<br />lidid, voorletters, tussenvoegsel, achternaam, telefoon</p>',
                'is_final' => 0,
                'level_id' => 1,
                'created_at' => '2018-11-29 13:40:03',
                'updated_at' => '2018-11-29 13:47:21',
                'is_first' => 0,
                'next_id' => 6,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Opdracht 7 - ERD',
                'course_id' => 1,
                'content' => '<p>Maak van het volgende overzicht, de lijst met gegevens, de nulde, de eerste, tweede en derde normaalvorm het<br />Entiteit Relatie Diagram op de manier zoals in de filmpjes is getoond.</p>
<p><strong><span style="color: #ff0000;">Upload het bestand en zet je naam en studentnummer in het antwoordveld. </span></strong></p>
<p><strong>Commissie: Materiaalcommissie</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Naam</strong></td>
<td style="width: 50%;"><strong>Telefoonnummer</strong></td>
</tr>
<tr>
<td style="width: 50%;">J. Jansen</td>
<td style="width: 50%;">036-3568912</td>
</tr>
<tr>
<td style="width: 50%;">F. van Bosch</td>
<td style="width: 50%;">06-98653214</td>
</tr>
<tr>
<td style="width: 50%;">M. Mathijsen</td>
<td style="width: 50%;">0320-827364</td>
</tr>
<tr>
<td style="width: 50%;">M. H. Abdelkader</td>
<td style="width: 50%;">06-19283765</td>
</tr>
<tr>
<td style="width: 50%;">T. Mobile</td>
<td style="width: 50%;">06-61278394</td>
</tr>
<tr>
<td style="width: 50%;">Jessie K.</td>
<td style="width: 50%;">0320-445566</td>
</tr>
<tr>
<td style="width: 50%;"><strong>Totaal aantal leden</strong></td>
<td style="width: 50%;"><strong>6</strong></td>
</tr>
</tbody>
</table>
<p><strong>Lijst met gegevens</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Eigenschap</strong></td>
<td style="width: 50%;"><strong>Soort gegeven</strong></td>
</tr>
<tr>
<td style="width: 50%;">Commissie (titel)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Commissienaam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Naam (kolomkop)</td>
<td style="width: 50%;">Samengesteld gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Naam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Voorletters</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Tussenvoegsel</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Achternaam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Telefoon (kolomkop)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Telefoonnummer</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Totaal (label)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Aantal</td>
<td style="width: 50%;">Procesgegeven</td>
</tr>
</tbody>
</table>
<p><strong>0e Normaalvorm</strong><br />Commissieid, Commissienaam, RG(lidid, voorletters, tussenvoegsel, achternaam, telefoon)</p>
<p><strong>1e Normaalvorm</strong><br />Commissieid, commissienaam<br />Commissieid, lidid, voorletters, tussenvoegsel, achternaam, telefoon<br /><br /><strong>2e Normaalvorm</strong><br />Commissieid, commissienaam<br />Commissieid, lidid<br />lidid, voorletters, tussenvoegsel, achternaam, telefoon</p>
<p><strong>3e Normaalvorm</strong><br />Commissie: Commissieid, commissienaam<br />LidCommissie: Commissieid, lidid<br />Lid: lidid, voorletters, tussenvoegsel, achternaam, telefoon</p>',
                'is_final' => 0,
                'level_id' => 2,
                'created_at' => '2018-11-29 13:47:21',
                'updated_at' => '2018-12-03 10:07:41',
                'is_first' => 0,
                'next_id' => 7,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Opdracht 8 - Datadictionary',
                'course_id' => 1,
                'content' => '<p>Maak van het volgende overzicht, de lijst met gegevens, de nulde, de eerste, tweede en derde normaalvorn en het Entiteit Relatie Diagram de datadictionary op de manier zoals in de filmpjes is getoond.</p>
<p><strong><span style="color: #ff0000;">Upload het bestand en zet je naam en studentnummer in het antwoordveld. </span></strong></p>
<p><strong>Commissie: Materiaalcommissie</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Naam</strong></td>
<td style="width: 50%;"><strong>Telefoonnummer</strong></td>
</tr>
<tr>
<td style="width: 50%;">J. Jansen</td>
<td style="width: 50%;">036-3568912</td>
</tr>
<tr>
<td style="width: 50%;">F. van Bosch</td>
<td style="width: 50%;">06-98653214</td>
</tr>
<tr>
<td style="width: 50%;">M. Mathijsen</td>
<td style="width: 50%;">0320-827364</td>
</tr>
<tr>
<td style="width: 50%;">M. H. Abdelkader</td>
<td style="width: 50%;">06-19283765</td>
</tr>
<tr>
<td style="width: 50%;">T. Mobile</td>
<td style="width: 50%;">06-61278394</td>
</tr>
<tr>
<td style="width: 50%;">Jessie K.</td>
<td style="width: 50%;">0320-445566</td>
</tr>
<tr>
<td style="width: 50%;"><strong>Totaal aantal leden</strong></td>
<td style="width: 50%;"><strong>6</strong></td>
</tr>
</tbody>
</table>
<p><strong>Lijst met gegevens</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Eigenschap</strong></td>
<td style="width: 50%;"><strong>Soort gegeven</strong></td>
</tr>
<tr>
<td style="width: 50%;">Commissie (titel)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Commissienaam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Naam (kolomkop)</td>
<td style="width: 50%;">Samengesteld gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Naam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Voorletters</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Tussenvoegsel</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Achternaam</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Telefoon (kolomkop)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Telefoonnummer</td>
<td style="width: 50%;">Elementair gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Totaal (label)</td>
<td style="width: 50%;">Constant gegeven</td>
</tr>
<tr>
<td style="width: 50%;">Aantal</td>
<td style="width: 50%;">Procesgegeven</td>
</tr>
</tbody>
</table>
<p><strong>0e Normaalvorm</strong><br />Commissieid, Commissienaam, RG(lidid, voorletters, tussenvoegsel, achternaam, telefoon)</p>
<p><strong>1e Normaalvorm</strong><br />Commissieid, commissienaam<br />Commissieid, lidid, voorletters, tussenvoegsel, achternaam, telefoon<br /><br /><strong>2e Normaalvorm</strong><br />Commissieid, commissienaam<br />Commissieid, lidid<br />lidid, voorletters, tussenvoegsel, achternaam, telefoon</p>
<p><strong>3e Normaalvorm</strong><br />Commissie: Commissieid, commissienaam<br />LidCommissie: Commissieid, lidid<br />Lid: lidid, voorletters, tussenvoegsel, achternaam, telefoon</p>
<p><strong>Entiteit Relatie Diagram<br /></strong>Sportvereniging: Zie bijlage.</p>',
                'is_final' => 0,
                'level_id' => 2,
                'created_at' => '2018-11-29 14:03:53',
                'updated_at' => '2018-12-03 10:07:07',
                'is_first' => 0,
                'next_id' => 8,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Opdracht 9 - SQL-script',
                'course_id' => 1,
                'content' => '<p><strong><span style="color: #ff0000;">Upload hier onder het SQL bestand en zet je naam en studentnummer in het antwoordveld. </span></strong></p>',
                'is_final' => 0,
                'level_id' => 2,
                'created_at' => '2018-11-29 14:08:06',
                'updated_at' => '2018-12-03 10:10:18',
                'is_first' => 0,
                'next_id' => 9,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Opdracht 10 - Gegevens opvragen',
                'course_id' => 1,
                'content' => '<p>Haal met behulp van twee queries uit je eigen database de gegevens voor het overzicht van de barcommissie en lever deze twee queries in in het antwoordveld hier onder.</p>
<p>Zorg er eerst voor dat de gegevens in je database staan. Zie hiervoor de onderstaande tabel:</p>
<p><strong>Overzicht van een commissie:</strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 50%;"><strong>Naam</strong></td>
<td style="width: 50%;"><strong>Telefoon</strong></td>
</tr>
<tr>
<td style="width: 50%;">L. Lucassen</td>
<td style="width: 50%;">06-12345678</td>
</tr>
<tr>
<td style="width: 50%;">I. ter Weijden</td>
<td style="width: 50%;">06-987654321</td>
</tr>
<tr>
<td style="width: 50%;">T. van Bosch</td>
<td style="width: 50%;">06-67542389</td>
</tr>
<tr>
<td style="width: 50%;"><strong>Totaal</strong></td>
<td style="width: 50%;">3</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>',
                'is_final' => 0,
                'level_id' => 2,
                'created_at' => '2018-11-29 14:15:36',
                'updated_at' => '2018-12-03 10:12:29',
                'is_first' => 0,
                'next_id' => 10,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Opdracht 11 - Opdracht opleiding',
                'course_id' => 1,
                'content' => '<p>Normaliseer het overzicht in het document opleiding.pdf. Doe dit zoals je dit geleerd hebt in de vorige opdrachten.</p>
<ul>
<li>Maak een document met de volgende onderdelen:</li>
<li>Lijst met gegevens</li>
<li>0e, 1e, 2e en 3e normaalvorm</li>
<li>Entiteiten Relatie Diagram (ERD)</li>
<li>Datadictionary</li>
</ul>
<p>Een voorbeeld van deze onderdelen vind je in het document Voorbeeld.pdf.<br />Bovendien maak je de volgende onderdelen:</p>
<ul>
<li>SQL-script</li>
<li>Queries waarmee de gegevens uit de database worden gehaald.</li>
</ul>
<p><strong><span style="color: #ff0000;">Upload het bestand en zet je naam en studentnummer in het antwoordveld.</span></strong></p>
<p><strong>Bijlagen:</strong><br />Voorbeeld.pdf<br />Opleiding.pdf</p>',
                'is_final' => 0,
                'level_id' => 3,
                'created_at' => '2018-11-29 14:21:54',
                'updated_at' => '2018-12-03 10:11:57',
                'is_first' => 0,
                'next_id' => 11,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Opdracht 12 - opdracht steden, landen en werelddelen',
                'course_id' => 1,
                'content' => '<p>Deze opdracht bevat een moeilijkheid die je nog niet tegen gekomen bent: Er komt niet een repeating group in voor, maar er komen er twee in voor. De twee repeating groups zijn genest: dus een repeating group in een repeating group. Probeer deze eerst zelf op te lossen.</p>
<p>Maak een document van werelddelen.pdf met de volgende onderdelen:</p>
<ul>
<li>lijst met gegevens</li>
<li>0e, 1e, 2e en 3e normaalvorm</li>
<li>ERD</li>
<li>Datadictinary</li>
<li>SQL-script</li>
<li>Queries waarmee data opghaald kan worden</li>
</ul>
<p><strong><span style="color: #ff0000;">Upload het zip-bestand, met deze files en zet je naam en studentnummer in het antwoordveld.</span></strong></p>
<p><strong>Bijlage:</strong><br />Werelddelen.pdf</p>',
                'is_final' => 0,
                'level_id' => 3,
                'created_at' => '2018-11-29 14:31:41',
                'updated_at' => '2018-12-03 10:13:30',
                'is_first' => 0,
                'next_id' => 12,
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Eindopdracht - MySQL en PHP',
                'course_id' => 1,
                'content' => '<p>Hieronder vind je drie php-bestanden: index.php, commissie.php en database.php. De eerste twee bestanden zijn web-pagina\'s, de derde is een klasse in PHP die op de achtergrond werkt.</p>
<p>In die klasse wordt de verbinding met de database sportvereniging gemaakt. Deze database heb je gemaakt in de opdrachten 010 tot en met 040. De databaseserver draait op dezelfde computer als de webserver. De klasse staat in een aparte map: classes.</p>
<p>In het commentaar in de klasse database kun je lezen wat elke functie doet. De klasse is zo gemaakt dat hij algemeen toepasbaar is, dat wil zeggen dat je deze klasse ook met andere mysql-servers en met andere databases kunt gebruiken. Het enige wat je moet doen, is de gegevens en de queries aanpassen.</p>
<p>In index.php en commissie.php wordt gebruik gemaakt van HTML, PHP en Javascript. De gegevens worden door PHP via de klasse database opgevraagd uit de database, HTML zorgt ervoor dat alles in het venster van de browser wordt weergegeven en Javascript verzorgt het gedrag van de pagina\'s.</p>
<p><span style="color: #ff0000;"><strong>Lever je opdracht in als een zip en zet je naam en studentnummer in het antwoordenveld!</strong></span></p>',
                'is_final' => 1,
                'level_id' => 1,
                'created_at' => '2018-12-03 09:04:48',
                'updated_at' => '2018-12-03 10:15:56',
                'is_first' => 0,
                'next_id' => 13,
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'Eindopdracht - Opdracht Menu',
                'course_id' => 1,
                'content' => '<p>Deze opdracht bevat een moeilijkheid die je in 055 - Werelddelen, landen en steden tegen gekomen bent: Er komt niet een repeating group in voor, maar er komen er twee in voor. Nieuw is nu de lay-out van het overzicht: Deze is anders dan in de vorige opdrachten.</p>
<p>Maak een document van menu.pdf met de volgende onderdelen:</p>
<ul>
<li>Lijst met gegevens</li>
<li>0e, 1e, 2e en 3e normaalvorm</li>
<li>Entiteiten Relatie Diagram (ERD)</li>
<li>Datadictionary</li>
<li>SQL-scriptQueries waarmee de gegevens uit de database worden gehaald.</li>
</ul>
<p>Voor een voorbeeld zie:</p>
<ul>
<li>Antwoorden: Opdracht 11 - opdracht opleiding</li>
<li>Antwoorden: Opdracht 12 - opdracht werelddelen</li>
</ul>
<p><strong><span style="color: #ff0000;">Upload de bestanden als een zip-file en zet je naam en studentnummer in het antwoordveld.</span></strong></p>
<p>&nbsp;</p>',
                'is_final' => 1,
                'level_id' => 3,
                'created_at' => '2018-12-03 09:12:27',
                'updated_at' => '2018-12-03 10:15:25',
                'is_first' => 0,
                'next_id' => NULL,
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lessons')->delete();
        
        \DB::table('lessons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '001 - Wat is normalisatie?',
                'content' => '<p>Bijna alle applicaties, websites en apps maken gebruik van een database. Vaak maken meerdere applicaties van dezelfde database gebruik. Het is dan ook heel belangrijk dat gegevens in een database op een juiste manier worden opgeslagen. Als dat niet gebeurt, kan er heel veel fout gaan. Gegevens zijn niet meer juist of worden niet op een juiste wijze gepresenteerd. En dat betekent dan dat je wijzigingen in de database moet aanbrengen, maar het betekent ook dat alle applicaties die van die database gebruik maken, aangepast moeten worden aan de nieuwe structuur in de database.</p>
<p>Het is daarom heel belangrijk dat de structuur van een database goed is, voordat je een applicatie gaat ontwikkelen. Het is de kern van het vak en iedereen die een database ontwerpt, volgt het normalisatieproces. Dat normalisatieproces is wat je in deze lessenreeks gaat leren.<br /><br /><strong>Link:</strong><br /><a href="https://www.lynda.com/Access-tutorials/Understanding-normalization/412845/438436-4.html">https://www.lynda.com/Access-tutorials/Understanding-normalization/412845/438436-4.html</a><br /><br /><strong>Bijbehorende opdracht:</strong><br />Opdracht 1 - Wat is normalisatie?</p>',
                'course_id' => 1,
                'level_id' => 1,
                'created_at' => '2018-11-29 10:52:52',
                'updated_at' => '2018-11-29 11:18:16',
                'is_first' => 1,
                'next_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '005 - Gegevens en informatie',
                'content' => '<div class="tXBI6b">
<div class="hDheod">
<div>Bij applicatieontwikkeling en ICT gaat het om het maken van informatie. Dat is de core-bussiness. Om informatie te kunnen maken heb je gegevens nodig.<br /><br />In deze les leer je wat informatie is en wat gegevens zijn.</div>
<div>&nbsp;</div>
<div>Media:</div>
<div><a href="https://www.youtube.com/watch?time_continue=3&amp;v=l6t-HnDTJvk">https://www.youtube.com/watch?time_continue=3&amp;v=l6t-HnDTJvk</a></div>
<div>&nbsp;</div>
<div>Bijlage:</div>
<div>Informatie- Normaliseren.pptx</div>
</div>
</div>',
                'course_id' => 1,
                'level_id' => 1,
                'created_at' => '2018-11-29 11:18:16',
                'updated_at' => '2018-12-03 09:42:07',
                'is_first' => 0,
                'next_id' => 3,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => '010 - Lijst gegevens maken',
                'content' => '<p>Het begin van normalisatie is goed kijken naar het overzicht waarin de informatie staat. In deze opdracht leer je te zien welke gegevens in een overzicht staan en welke gegevens in de database komen te staan.</p>
<p>Bestudeer de presentaties en filmpjes Lijst met gegevens 1 en Lijst met gegevens 2 goed, maak de opdracht en lever deze in.</p>
<p>Bijlagen<br />Lijst met gegevens.pdf<br />Lijst met gegevens 2.pdf</p>
<p>Media:<br /><a href="https://www.youtube.com/watch?v=Q7bNSF2eUNU">https://www.youtube.com/watch?v=Q7bNSF2eUNU</a> <br /><a href="https://www.youtube.com/watch?v=MoVaam6FcC4">https://www.youtube.com/watch?v=MoVaam6FcC4</a></p>',
                'course_id' => 1,
                'level_id' => 1,
                'created_at' => '2018-11-29 11:28:47',
                'updated_at' => '2018-12-03 09:47:47',
                'is_first' => 0,
                'next_id' => 4,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => '015 - 0e en 1e normaalvorm',
                'content' => '<p>In deze les leer je hoe je de nulde en eerste normaalvorm maakt. Belangrijk daarbij zijn begrippen als de repeating group en sleutels. De 0e normaalvorm is gebaseerd op de lijst met gegevens en de 1e normaalvorm is afgeleid van de 0e normaalvorm.<br /><br />Er zijn twee filmpjes over sleutels in een database en er is een filmpje over de herhalende groep. Bekijk deze drie filmpjes en bekijk daarna het filmpje over het maken van de 0e en 1e normaalvorm. Maak daarna de les en lever deze in.</p>
<div class="mAeA1"><br />
<div class="mAeA1">
<div class="S8qYve gMIble j3QDgc"><strong>Bijlage:</strong></div>
</div>
<div class="J5AvUe">
<div class="bKJwEd Evt7cb VBEdtc-Wvd9Cc zZN2Lb-Wvd9Cc">Nulde en eerste normaalvorm.zip</div>
</div>
</div>
<div class="J5AvUe">
<div class="IMvYId cfaOwb">
<div class="kRYv9b YVvGBb"><br />
<div class="J5AvUe">
<div class="kRYv9b YVvGBb"><strong>Links:</strong><br />
<div class="mAeA1">
<div class="J5AvUe">
<div class="IMvYId cfaOwb">
<div class="kRYv9b YVvGBb"><a href="https://www.lynda.com/Programming-Foundations-tutorials/Exploring-unique-values-primary-keys/412845/438418-4.html">https://www.lynda.com/Programming-Foundations-tutorials/Exploring-unique-values-primary-keys/412845/438418-4.html</a></div>
<div class="kRYv9b YVvGBb">&nbsp;</div>
</div>
</div>
</div>
<div class="J5AvUe">
<div class="IMvYId cfaOwb">
<div class="kRYv9b YVvGBb"><a href="https://www.lynda.com/Programming-Foundations-tutorials/First-normal-form/412845/438437-4.html">https://www.lynda.com/Programming-Foundations-tutorials/First-normal-form/412845/438437-4.html</a></div>
<div class="kRYv9b YVvGBb">&nbsp;</div>
<div class="kRYv9b YVvGBb"><strong>Opdracht:</strong></div>
<div class="kRYv9b YVvGBb">Opdrach 3: Nulde en eerste normaalvorm</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>',
                'course_id' => 1,
                'level_id' => 1,
                'created_at' => '2018-11-29 13:02:34',
                'updated_at' => '2018-12-03 09:49:42',
                'is_first' => 0,
                'next_id' => 5,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => '020 - Tweede normaalvorm',
            'content' => '<p>Na de 1e normaalvorm komt de 2e normaalvorm. Nu gaat het om de samengestelde (composite) sleutels. Welke velden zijn afhankelijk van de gehele sleutel en welke van een deel van de sleutel.</p>
<p>Bestudeer de filmpjes goed, maak de opdracht en lever deze in.</p>
<p><strong>Links:<br /></strong><a href="https://www.lynda.com/Programming-Foundations-tutorials/Second-normal-form/412845/438438-4.html">https://www.lynda.com/Programming-Foundations-tutorials/Second-normal-form/412845/438438-4.html</a></p>
<p><a href="https://www.youtube.com/watch?v=JUPBGTf-ExA">https://www.youtube.com/watch?v=JUPBGTf-ExA</a></p>
<div class="J5AvUe">
<div class="IMvYId cfaOwb">
<div class="kRYv9b YVvGBb"><strong>Bijlage</strong><strong>:</strong><br />tweede_normaalvorm.pdf</div>
<div class="kRYv9b YVvGBb">&nbsp;</div>
<div class="kRYv9b YVvGBb"><strong>Opdracht:</strong></div>
<div class="kRYv9b YVvGBb">Opdracht 5 - het maken van de tweede normaalvorm</div>
</div>
</div>',
                'course_id' => 1,
                'level_id' => 1,
                'created_at' => '2018-11-29 13:28:22',
                'updated_at' => '2018-12-03 09:52:42',
                'is_first' => 0,
                'next_id' => 6,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => '025 - Derde Normaalvorm',
                'content' => '<p>En dan de laatste normaalvorm: de derde. Het gaat er nu om welke velden niet of niet helemaal bij een primaire sleutel horen. Deze verplaatsen we naar een nieuwe regel.</p>
<p>Bekijk de filmpjes goed en maak de opdracht en lever deze in.</p>
<p><strong>Links:<br /></strong><a href="https://www.lynda.com/Programming-Foundations-tutorials/Third-normal-form/412845/438439-4.html">https://www.lynda.com/Programming-Foundations-tutorials/Third-normal-form/412845/438439-4.html</a></p>
<p><a href="https://www.youtube.com/watch?v=J0Kihv9DSyE">https://www.youtube.com/watch?v=J0Kihv9DSyE</a></p>
<p><strong>Bijlage:</strong><br />derde_normaalvorm.pdf</p>
<p><strong>Opdracht:</strong><br />Opdracht 6 - Derde Normaalvorm</p>
<p>&nbsp;</p>
<p>&nbsp;</p>',
                'course_id' => 1,
                'level_id' => 1,
                'created_at' => '2018-11-29 13:36:33',
                'updated_at' => '2018-11-29 13:44:01',
                'is_first' => 0,
                'next_id' => 7,
            ),
            6 => 
            array (
                'id' => 7,
            'title' => '030 - Entiteit Relatie Diagram (ERD)',
            'content' => '<p>Na de derde normaalvorm komt de Entiteit Relatie Diagram (ERD). Dit ERD wordt afgeleid van de derde normaalvorm. Het diagram bestaat uit twee onderdelen: de entiteiten en de relaties tussen de entiteiten. In deze les wordt uitgelegd wat entiteiten zijn en hoe je de relaties tussen de entiteiten maakt.</p>
<p>Bekijk de filmpjes goed en maak de opdracht.</p>
<p><strong>Links: </strong><br /><a href="https://www.lynda.com/FileMaker-Pro-tutorials/Understanding-relationship-types/161168/172251-4.html">https://www.lynda.com/FileMaker-Pro-tutorials/Understanding-relationship-types/161168/172251-4.html</a></p>
<p><a href="https://www.youtube.com/watch?v=H7L3_ROQQFI">https://www.youtube.com/watch?v=H7L3_ROQQFI</a></p>
<p><a href="https://www.youtube.com/watch?v=38QZJ1y9hkI">https://www.youtube.com/watch?v=38QZJ1y9hkI</a></p>
<p><strong>Bijlage:</strong><br />ERD.pdf</p>
<p><strong>Opdracht:</strong><br />Opdracht 7 - ERD</p>
<p>&nbsp;</p>',
                'course_id' => 1,
                'level_id' => 2,
                'created_at' => '2018-11-29 13:44:01',
                'updated_at' => '2018-12-03 09:54:40',
                'is_first' => 0,
                'next_id' => 8,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => '035 - Datadictionary',
                'content' => '<p>De datadictionary is de overgang van de logica naar de techniek van een database. De inhoud van een datadictionary is deels afhasnkelijk van de keuze van de database: bijvoorbeeld Oracle, DB4, Paradox of MySQL.</p>
<p>In deze les leer je hoe je een datadictionary maakt.</p>
<p><strong>Links:<br /></strong><a href="https://www.youtube.com/watch?v=neIJeoE7JC8">https://www.youtube.com/watch?v=neIJeoE7JC8</a></p>
<div class="J5AvUe">
<div class="bKJwEd Evt7cb VBEdtc-Wvd9Cc zZN2Lb-Wvd9Cc"><strong>Bijlage:</strong><br />Datadictionary.pdf</div>
<div class="bKJwEd Evt7cb VBEdtc-Wvd9Cc zZN2Lb-Wvd9Cc">&nbsp;</div>
<div class="bKJwEd Evt7cb VBEdtc-Wvd9Cc zZN2Lb-Wvd9Cc"><strong>Opdracht:<br /></strong>Opdracht 8 - Datadictionary</div>
</div>',
                'course_id' => 1,
                'level_id' => 2,
                'created_at' => '2018-11-29 13:52:26',
                'updated_at' => '2018-12-03 09:55:35',
                'is_first' => 0,
                'next_id' => 9,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => '040 - SQL-Script',
                'content' => '<p>Na de lijst met gegevens, na de vier normaalvormen, na de Entiteit Relatie Diagram en na de datadictionary is het eindelijk zover: We gaan de database daadwerkelijk in de databaseserver invoeren. Dat doen we door de ERD in workbench te openen, de gegevens en het commentaar uit de datadictionary toe te voegen en de veld- of kolomtypen toe te voegen. Vervolgens maken we daar een SQL-script van en voeren we deze uit. Een SQL-script wordt ook wel een creatiescript genoemd.<br /><br /><strong>Link:<br /></strong><a href="https://www.youtube.com/watch?v=RwT3Mqkz2Ik">https://www.youtube.com/watch?v=RwT3Mqkz2Ik</a></p>
<p><strong>Opdracht:<br /></strong>Opdracht 8 - SQL-script</p>',
                'course_id' => 1,
                'level_id' => 2,
                'created_at' => '2018-11-29 14:05:30',
                'updated_at' => '2018-12-03 09:59:33',
                'is_first' => 0,
                'next_id' => 10,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => '045 - Gegevens opvragen uit de database',
                'content' => '<p>De database is gemaakt, de gegevens staan in de database. Nu moeten we proberen de informatie waarmee we zijn begonnen uit de database te halen. Zie voor de theorie over joins het filmpje over meerdere tabellen en het filmpje van Lynda.com.</p>
<p><strong>Links:</strong><br /><a href="https://www.youtube.com/watch?v=h79Pk-p0r5Q">https://www.youtube.com/watch?v=h79Pk-p0r5Q</a></p>
<p><a href="https://www.lynda.com/MySQL-tutorials/Joining-tables-matching-fields-using-INNER-JOIN/158373/168228-4.html">https://www.lynda.com/MySQL-tutorials/Joining-tables-matching-fields-using-INNER-JOIN/158373/168228-4.html</a></p>
<p><a href="https://www.youtube.com/watch?v=SEQsHZAw6Ps">https://www.youtube.com/watch?v=SEQsHZAw6Ps</a></p>
<p><a href="https://www.youtube.com/watch?v=irZBb50yJrQ">https://www.youtube.com/watch?v=irZBb50yJrQ</a></p>
<p><strong>Opdracht:</strong><br />Opracht 10 - Gegevens opvragen</p>',
                'course_id' => 1,
                'level_id' => 2,
                'created_at' => '2018-11-29 14:11:44',
                'updated_at' => '2018-12-03 10:01:27',
                'is_first' => 0,
                'next_id' => 11,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Antwoorden: Opdracht 11 - opdracht opleiding',
                'content' => '<p>Hier vind je de oplossing van de opdracht opleiding. Zie daarvoor de bestanden hieronder.</p>
<p><strong>Bijlagen:</strong><br />SQL-script_opleiding.pdf<br />Opleiding_oplossen.pdf</p>',
                'course_id' => 1,
                'level_id' => 1,
                'created_at' => '2018-11-29 14:26:48',
                'updated_at' => '2018-11-29 14:26:48',
                'is_first' => 0,
                'next_id' => 12,
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Antwoorden: Opdracht 12 - opdracht werelddelen',
                'content' => '<p>Hier vind je de oplossing van de opdracht Steden, landen en werelddelen. Zie daarvoor de bijlagen hieronder.</p>
<p><strong>Bijlagen:</strong><br />werelddelen.zip</p>',
                'course_id' => 1,
                'level_id' => 1,
                'created_at' => '2018-11-29 14:35:09',
                'updated_at' => '2018-11-29 14:37:40',
                'is_first' => 0,
                'next_id' => NULL,
            ),
        ));
        
        
    }
}
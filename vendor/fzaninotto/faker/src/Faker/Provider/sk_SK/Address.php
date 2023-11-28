<?php

namespace Faker\Provider\sk_SK;

class Address extends \Faker\Provider\Address
{

    protected static $cityName = array(
        'Ábelová', 'Abovce', 'Abrahám', 'Abrahámovce', 'Abrahámovce', 'Abramová', 'Abranovce', 'Adamovské Kochanovce', 'Adidovce', 'Alekšince',
        'Andovce', 'Andrejová', 'Ardanovce', 'Ardovo', 'Arnutovce', 'Báb', 'Babie', 'Babín', 'Babiná', 'Babindol', 'Babinec', 'Bacúch', 'Bacúrov',
        'Báč', 'Bačka', 'Bačkov', 'Bačkovík', 'Bádice', 'Badín', 'Baďan', 'Báhoň', 'Bajany', 'Bajč', 'Bajerov', 'Bajerovce', 'Bajka', 'Bajtava',
        'Baka', 'Baláže', 'Baldovce', 'Balog nad Ipľom', 'Baloň', 'Banka', 'Bánov', 'Bánovce nad Bebravou', 'Bánovce nad Ondavou', 'Banská Belá',
        'Banská Bystrica', 'Banská Štiavnica', 'Banské', 'Banský Studenec', 'Baňa', 'Bara', 'Barca', 'Bardejov', 'Bardoňovo', 'Bartošova Lehôtka',
        'Bartošovce', 'Baška', 'Baškovce', 'Baškovce', 'Bašovce', 'Batizovce', 'Bátka', 'Bátorová', 'Bátorove Kosihy', 'Bátovce', 'Beckov',
        'Beharovce', 'Becherov', 'Belá', 'Belá', 'Belá-Dulice', 'Belá nad Cirochou', 'Beladice', 'Belejovce', 'Belín', 'Belina', 'Belince',
        'Bellova Ves', 'Beloveža', 'Beluj', 'Beluša', 'Belža', 'Beniakovce', 'Benice', 'Benkovce', 'Beňadiková', 'Beňadikovce', 'Beňadovo',
        'Beňatina', 'Beňuš', 'Bernolákovo', 'Bertotovce', 'Beša', 'Beša', 'Bešeňov', 'Bešeňová', 'Betlanovce', 'Betliar', 'Bežovce', 'Bidovce',
        'Biel', 'Bielovce', 'Biely Kostol', 'Bijacovce', 'Bílkove Humence', 'Bíňa', 'Bíňovce', 'Biskupice', 'Biskupová', 'Bitarová', 'Blahová',
        'Blatná na Ostrove', 'Blatná Polianka', 'Blatné', 'Blatné Remety', 'Blatné Revištia', 'Blatnica', 'Blažice', 'Blažovce', 'Blesovce',
        'Blhovce', 'Bobot', 'Bobrov', 'Bobrovček', 'Bobrovec', 'Bobrovník', 'Bočiar', 'Bodíky', 'Bodiná', 'Bodorová', 'Bodovce', 'Bodružal',
        'Bodza', 'Bodzianske Lúky', 'Bogliarka', 'Bohdanovce', 'Bohdanovce nad Trnavou', 'Boheľov', 'Bohunice', 'Bohunice', 'Bohúňovo', 'Bojná',
        'Bojnice', 'Bojničky', 'Boldog', 'Boleráz', 'Bolešov', 'Boliarov', 'Boľ', 'Boľkovce', 'Borcová', 'Borčany', 'Borčice', 'Borinka', 'Borová',
        'Borovce', 'Borský Mikuláš', 'Borský Svätý Jur', 'Borša', 'Bory', 'Bošáca', 'Bošany', 'Bottovo', 'Boťany', 'Bôrka', 'Bracovce', 'Branč',
        'Branovo', 'Bratislava', 'Braväcovo', 'Brdárka', 'Brehov', 'Brehy', 'Brekov', 'Brestov', 'Brestov', 'Brestov nad Laborcom', 'Brestovany',
        'Brestovec', 'Brestovec', 'Bretejovce', 'Bretka', 'Breza', 'Brezany', 'Brezina', 'Breziny', 'Breznica', 'Breznička', 'Breznička', 'Brezno',
        'Brezolupy', 'Brezov', 'Brezová pod Bradlom', 'Brezovec', 'Brezovica', 'Brezovica', 'Brezovička', 'Brezovka', 'Brežany', 'Brhlovce',
        'Brieštie', 'Brodské', 'Brodzany', 'Brunovce', 'Brusnica', 'Brusník', 'Brusno', 'Brutovce', 'Bruty', 'Brvnište', 'Brzotín', 'Buclovany',
        'Búč', 'Bučany', 'Budča', 'Budikovany', 'Budimír', 'Budiná', 'Budince', 'Budiš', 'Budkovce', 'Budmerice', 'Buglovce', 'Buková', 'Bukovce',
        'Bukovec', 'Bukovec', 'Bukovina', 'Bulhary', 'Bunetice', 'Bunkovce', 'Bušince', 'Bušovce', 'Buzica', 'Buzitka', 'Bystrá', 'Bystrá',
        'Bystrany', 'Bystré', 'Bystričany', 'Bystrička', 'Byšta', 'Bytča', 'Bzenica', 'Bzenov', 'Bzince pod Javorinou', 'Bziny', 'Bzovík',
        'Bzovská Lehôtka', 'Bžany', 'Cabaj-Čápor', 'Cabov', 'Cakov', 'Cejkov', 'Cernina', 'Cerová', 'Cerovo', 'Cestice', 'Cífer', 'Cigeľ',
        'Cigeľka', 'Cigla', 'Cimenná', 'Cinobaňa', 'Čab', 'Čabalovce', 'Čabiny', 'Čabradský Vrbovok', 'Čadca', 'Čachtice', 'Čajkov', 'Čaka',
        'Čakajovce', 'Čakanovce', 'Čakanovce', 'Čakany', 'Čaklov', 'Čalovec', 'Čamovce', 'Čaňa', 'Čaradice', 'Čáry', 'Častá', 'Častkov',
        'Častkovce', 'Čata', 'Čataj', 'Čavoj', 'Čebovce', 'Čečehov', 'Čečejovce', 'Čechy', 'Čechynce', 'Čekovce', 'Čeláre', 'Čelkova Lehota',
        'Čelovce', 'Čelovce', 'Čeľadice', 'Čeľadince', 'Čeľovce', 'Čenkovce', 'Čerenčany', 'Čereňany', 'Čerhov', 'Čerín', 'Čermany', 'Černík',
        'Černina', 'Černochov', 'Čertižné', 'Červená Voda', 'Červenica', 'Červenica pri Sabinove', 'Červeník', 'Červený Hrádok', 'Červený Kameň',
        'Červený Kláštor', 'Červeňany', 'České Brezovo', 'Čičarovce', 'Čičava', 'Čičmany', 'Číčov', 'Čierna', 'Čierna Lehota', 'Čierna Lehota',
        'Čierna nad Tisou', 'Čierna Voda', 'Čierne', 'Čierne Kľačany', 'Čierne nad Topľou', 'Čierne Pole', 'Čierny Balog', 'Čierny Brod',
        'Čierny Potok', 'Čifáre', 'Čiližská Radvaň', 'Čimhová', 'Čirč', 'Číž', 'Čižatice', 'Čoltovo', 'Čremošné', 'Čučma', 'Čukalovce',
        'Dačov Lom', 'Daletice', 'Danišovce', 'Dargov', 'Davidov', 'Debraď', 'Dedačov', 'Dedina Mládeže', 'Dedinka', 'Dedinky', 'Dechtice',
        'Dekýš', 'Demandice', 'Demänovská Dolina', 'Demjata', 'Detrík', 'Detva', 'Detvianska Huta', 'Devičany', 'Devičie', 'Dežerice',
        'Diaková', 'Diakovce', 'Diviacka Nová Ves', 'Diviaky nad Nitricou', 'Divín', 'Divina', 'Divinka', 'Dlhá', 'Dlhá nad Kysucou',
        'Dlhá nad Oravou', 'Dlhá nad Váhom', 'Dlhá Ves', 'Dlhé Klčovo', 'Dlhé nad Cirochou', 'Dlhé Pole', 'Dlhé Stráže', 'Dlhoňa', 'Dlžín',
        'Dobrá', 'Dobrá Niva', 'Dobrá Voda', 'Dobroč', 'Dobrohošť', 'Dobroslava', 'Dobšiná', 'Dohňany', 'Dojč', 'Dolinka', 'Dolná Breznica',
        'Dolná Krupá', 'Dolná Lehota', 'Dolná Mariková', 'Dolná Mičiná', 'Dolná Poruba', 'Dolná Seč', 'Dolná Streda', 'Dolná Strehová',
        'Dolná Súča', 'Dolná Tižina', 'Dolná Trnávka', 'Dolná Ves', 'Dolná Ždaňa', 'Dolné Dubové', 'Dolné Kočkovce', 'Dolné Lefantovce',
        'Dolné Lovčice', 'Dolné Mladonice', 'Dolné Naštice', 'Dolné Obdokovce', 'Dolné Orešany', 'Dolné Otrokovce', 'Dolné Plachtince',
        'Dolné Saliby', 'Dolné Semerovce', 'Dolné Srnie', 'Dolné Strháre', 'Dolné Trhovište', 'Dolné Vestenice', 'Dolné Zahorany',
        'Dolné Zelenice', 'Dolný Badín', 'Dolný Bar', 'Dolný Harmanec', 'Dolný Hričov', 'Dolný Chotár', 'Dolný Kalník', 'Dolný Kubín',
        'Dolný Lieskov', 'Dolný Lopašov', 'Dolný Ohaj', 'Dolný Pial', 'Dolný Štál', 'Dolný Vadičov', 'Doľany', 'Doľany', 'Domadice',
        'Domaníky', 'Domaniža', 'Domaňovce', 'Donovaly', 'Drábsko', 'Drahňov', 'Drahovce', 'Dravce', 'Dražice', 'Dražkovce', 'Drážovce',
        'Drienčany', 'Drienica', 'Drienov', 'Drienovec', 'Drienovo', 'Drienovská Nová Ves', 'Drietoma', 'Drnava', 'Drňa', 'Družstevná pri Hornáde',
        'Drženice', 'Držkovce', 'Dubinné', 'Dubnica nad Váhom', 'Dubnička', 'Dubník', 'Dubno', 'Dubodiel', 'Dubová', 'Dubová', 'Dubovany',
        'Dubovce', 'Dubové', 'Dubové', 'Dubovec', 'Dubovica', 'Dúbrava', 'Dúbrava', 'Dúbrava', 'Dúbravica', 'Dúbravka', 'Dúbravy', 'Ducové',
        'Dudince', 'Dukovce', 'Dulov', 'Dulova Ves', 'Dulovce', 'Dulovo', 'Dunajská Lužná', 'Dunajov', 'Dunajská Streda', 'Dunajský Klátov',
        'Duplín', 'Dvorany nad Nitrou', 'Dvorec', 'Dvorianky', 'Dvorníky', 'Dvorníky-Včeláre', 'Dvory nad Žitavou', 'Ďačov', 'Ďanová',
        'Ďapalovce', 'Ďubákovo', 'Ďurčiná', 'Ďurďoš', 'Ďurďošík', 'Ďurďové', 'Ďurkov', 'Ďurková', 'Ďurkovce', 'Egreš', 'Fačkov', 'Falkušovce',
        'Farná', 'Fekišovce', 'Figa', 'Fijaš', 'Fiľakovo', 'Fiľakovské Kováče', 'Fintice', 'Folkušová', 'Forbasy', 'Frička', 'Fričkovce',
        'Fričovce', 'Fulianka', 'Gabčíkovo', 'Gaboltov', 'Gajary', 'Galanta', 'Galovany', 'Gánovce', 'Gáň', 'Gbelce', 'Gbely', 'Gbeľany',
        'Geča', 'Gelnica', 'Gemer', 'Gemerček', 'Gemerská Hôrka', 'Gemerská Panica', 'Gemerská Poloma', 'Gemerská Ves', 'Gemerské Dechtáre',
        'Gemerské Michalovce', 'Gemerské Teplice', 'Gemerský Jablonec', 'Gemerský Sad', 'Geraltov', 'Gerlachov', 'Gerlachov', 'Giglovce',
        'Giraltovce', 'Girovce', 'Glabušovce', 'Gočaltovo', 'Gočovo', 'Golianovo', 'Gortva', 'Gôtovany', 'Granč-Petrovce', 'Gregorova Vieska',
        'Gregorovce', 'Gribov', 'Gruzovce', 'Gyňov', 'Habovka', 'Habura', 'Hačava', 'Háj', 'Háj', 'Hajná Nová Ves', 'Hajnáčka', 'Hájske',
        'Hajtovka', 'Haláčovce', 'Halič', 'Haligovce', 'Haluzice', 'Hamuliakovo', 'Handlová', 'Hanigovce', 'Haniska', 'Haniska', 'Hanková',
        'Hankovce', 'Hankovce', 'Hanušovce nad Topľou', 'Harakovce', 'Harhaj', 'Harichovce', 'Harmanec', 'Hatalov', 'Hatné', 'Havaj', 'Havka',
        'Havranec', 'Hažín', 'Hažín nad Cirochou', 'Hažlín', 'Helcmanovce', 'Heľpa', 'Henckovce', 'Henclová', 'Hencovce', 'Hendrichovce',
        'Herľany', 'Hermanovce', 'Hermanovce nad Topľou', 'Hertník', 'Hervartov', 'Hiadeľ', 'Hincovce', 'Hladovka', 'Hlboké', 'Hlboké nad Váhom',
        'Hliník nad Hronom', 'Hlinné', 'Hlivištia', 'Hlohovec', 'Hniezdne', 'Hnilčík', 'Hnilec', 'Hnojné', 'Hnúšťa', 'Hodejov', 'Hodejovec',
        'Hodkovce', 'Hodruša-Hámre', 'Hokovce', 'Holčíkovce', 'Holiare', 'Holice', 'Holíč', 'Holiša', 'Holumnica', 'Honce', 'Hontianska Vrbica',
        'Hontianske Moravce', 'Hontianske Nemce', 'Hontianske Tesáre', 'Hontianske Trsťany', 'Horná Breznica', 'Horná Kráľová', 'Horná Krupá',
        'Horná Lehota', 'Horná Lehota', 'Horná Mariková', 'Horná Mičiná', 'Horná Poruba', 'Horná Potôň', 'Horná Seč', 'Horná Streda',
        'Horná Strehová', 'Horná Súča', 'Horná Štubňa', 'Horná Ves', 'Horná Ves', 'Horná Ždaňa', 'Horné Dubové', 'Horné Hámre', 'Horné Chlebany',
        'Horné Lefantovce', 'Horné Mladonice', 'Horné Mýto', 'Horné Naštice', 'Horné Obdokovce', 'Horné Orešany', 'Horné Otrokovce',
        'Horné Plachtince', 'Horné Pršany', 'Horné Saliby', 'Horné Semerovce', 'Horné Srnie', 'Horné Strháre', 'Horné Štitáre', 'Horné Trhovište',
        'Horné Turovce', 'Horné Vestenice', 'Horné Zahorany', 'Horné Zelenice', 'Horný Badín', 'Horný Bar', 'Horný Hričov', 'Horný Kalník',
        'Horný Lieskov', 'Horný Pial', 'Horný Tisovník', 'Horný Vadičov', 'Horňa', 'Horňany', 'Horovce', 'Horovce', 'Hoste', 'Hostice',
        'Hostie', 'Hostišovce', 'Hostovice', 'Hosťová', 'Hosťovce', 'Hosťovce', 'Hozelec', 'Hôrka', 'Hôrka nad Váhom', 'Hôrky', 'Hrabičov',
        'Hrabkov', 'Hrabová Roztoka', 'Hrabovčík', 'Hrabovec', 'Hrabovec nad Laborcom', 'Hrabovka', 'Hrabské', 'Hrabušice', 'Hradisko',
        'Hradište', 'Hradište', 'Hradište pod Vrátnom', 'Hrádok', 'Hrachovište', 'Hrachovo', 'Hraničné', 'Hranovnica', 'Hraň', 'Hrašné',
        'Hrašovík', 'Hrčeľ', 'Hrhov', 'Hriadky', 'Hričovské Podhradie', 'Hriňová', 'Hrišovce', 'Hrkovce', 'Hrlica', 'Hrnčiarovce nad Parnou',
        'Hrnčiarska Ves', 'Hrnčiarske Zalužany', 'Hrochoť', 'Hromoš', 'Hronec', 'Hronovce', 'Hronsek', 'Hronská Breznica', 'Hronská Dúbrava',
        'Hronské Kľačany', 'Hronské Kosihy', 'Hronský Beňadik', 'Hrubá Borša', 'Hruboňovo', 'Hrubov', 'Hrubý Šúr', 'Hrušov', 'Hrušov',
        'Hrušovany', 'Hrušovo', 'Hruštín', 'Hubice', 'Hubina', 'Hubošovce', 'Hubová', 'Hubovo', 'Hucín', 'Hudcovce', 'Hul', 'Humenné',
        'Huncovce', 'Hunkovce', 'Hurbanova Ves', 'Hurbanovo', 'Husák', 'Husiná', 'Hutka', 'Huty', 'Hviezdoslavov', 'Hvozdnica', 'Hybe',
        'Hýľov', 'Chanava', 'Chlebnice', 'Chlmec', 'Chľaba', 'Chmeľnica', 'Chmeľov', 'Chmeľová', 'Chmeľovec', 'Chminianska Nová Ves',
        'Chminianske Jakubovany', 'Chmiňany', 'Choča', 'Chocholná-Velčice', 'Choňkovce', 'Chorvátsky Grob', 'Chorváty', 'Chotča', 'Chotín',
        'Chrabrany', 'Chrámec', 'Chrastince', 'Chrastné', 'Chrasť nad Hornádom', 'Chrenovec-Brusno', 'Chropov', 'Chrťany', 'Chtelnica',
        'Chudá Lehota', 'Chvalová', 'Chvojnica', 'Chvojnica', 'Chynorany', 'Chyžné', 'Igram', 'Ihľany', 'Ihráč', 'Ilava', 'Iliašovce', 'Ilija',
        'Imeľ', 'Inovce', 'Iňa', 'Iňačovce', 'Ipeľské Predmostie', 'Ipeľské Úľany', 'Ipeľský Sokolec', 'Istebné', 'Ivachnová', 'Ivančiná',
        'Ivanice', 'Ivanka pri Dunaji', 'Ivanka pri Nitre', 'Ivanovce', 'Iža', 'Ižipovce', 'Ižkovce', 'Jablonec', 'Jablonica', 'Jablonka',
        'Jablonov', 'Jablonov nad Turňou', 'Jablonové', 'Jablonové', 'Jabloň', 'Jabloňovce', 'Jacovce', 'Jahodná', 'Jaklovce', 'Jakovany',
        'Jakubany', 'Jakubov', 'Jakubova Voľa', 'Jakubovany', 'Jakubovany', 'Jakušovce', 'Jalová', 'Jalovec', 'Jalovec', 'Jalšové', 'Jalšovík',
        'Jamník', 'Jamník', 'Janice', 'Janík', 'Janíky', 'Jankovce', 'Janov', 'Janova Lehota', 'Janovce', 'Jánovce', 'Jánovce', 'Janovík',
        'Jarabá', 'Jarabina', 'Jarok', 'Jarovnice', 'Jasenica', 'Jasenie', 'Jasenov', 'Jasenov', 'Jasenová', 'Jasenovce', 'Jasenové', 'Jasenovo',
        'Jaslovské Bohunice', 'Jasov', 'Jasová', 'Jastrabá', 'Jastrabie nad Topľou', 'Jastrabie pri Michalovciach', 'Jatov', 'Javorina',
        'Jazernica', 'Jedlinka', 'Jedľové Kostoľany', 'Jelenec', 'Jelka', 'Jelšava', 'Jelšovce', 'Jelšovec', 'Jenkovce', 'Jesenské', 'Jesenské',
        'Jestice', 'Ješkova Ves', 'Jezersko', 'Jovice', 'Jovsa', 'Jur nad Hronom', 'Jurkova Voľa', 'Jurová', 'Jurské', 'Juskova Voľa', 'Kačanov',
        'Kajal', 'Kalameny', 'Kalinkovo', 'Kalinov', 'Kalinovo', 'Kalná nad Hronom', 'Kalná Roztoka', 'Kálnica', 'Kalnište', 'Kalonda', 'Kalša',
        'Kaloša', 'Kaluža', 'Kaľamenová', 'Kaľava', 'Kamanová', 'Kamenec pod Vtáčnikom', 'Kamenica', 'Kamenica nad Cirochou', 'Kamenica nad Hronom',
        'Kameničany', 'Kameničná', 'Kamenín', 'Kamenná Poruba', 'Kamenná Poruba', 'Kamenné Kosihy', 'Kamenný Most', 'Kameňany', 'Kamienka',
        'Kamienka', 'Kanianka', 'Kapince', 'Kapišová', 'Kaplna', 'Kapušany', 'Kapušianske Kľačany', 'Karlová', 'Karná', 'Kašov', 'Kátlovce',
        'Kátov', 'Kazimír', 'Kecerovce', 'Kecerovský Lipovec', 'Kečkovce', 'Kečovo', 'Kechnec', 'Kendice', 'Kesovce', 'Keť', 'Kežmarok', 'Kiarov',
        'Kladzany', 'Klasov', 'Kláštor pod Znievom', 'Klátova Nová Ves', 'Klčov', 'Klenov', 'Klenová', 'Klenovec', 'Kleňany', 'Klieština', 'Klin',
        'Klin nad Bodrogom', 'Klížska Nemá', 'Klokoč', 'Klokočov', 'Klokočov', 'Klubina', 'Kluknava', 'Kľačany', 'Kľače', 'Kľačno', 'Kľak',
        'Kľúčovec', 'Kľušov', 'Kmeťovo', 'Kobeliarovo', 'Kobylnice', 'Kobyly', 'Koceľovce', 'Kociha', 'Kocurany', 'Kočín-Lančár', 'Kočovce',
        'Kochanovce', 'Kochanovce', 'Kojatice', 'Kojšov', 'Kokava nad Rimavicou', 'Kokošovce', 'Kokšov-Bakša', 'Kolačkov', 'Kolačno', 'Koláre',
        'Kolárovice', 'Kolárovo', 'Kolbasov', 'Kolbovce', 'Kolibabovce', 'Kolinovce', 'Kolíňany', 'Kolonica', 'Kolta', 'Komárany', 'Komárno',
        'Komárov', 'Komárovce', 'Komjatice', 'Komjatná', 'Komoča', 'Koniarovce', 'Konrádovce', 'Konská', 'Konská', 'Koňuš', 'Kopčany', 'Kopernica',
        'Koplotovce', 'Koprivnica', 'Kordíky', 'Korejovce', 'Korňa', 'Koromľa', 'Korunková', 'Korytárky', 'Korytné', 'Kosihovce',
        'Kosihy nad Ipľom', 'Kosorín', 'Kostolec', 'Kostolište', 'Kostolná pri Dunaji', 'Kostolná Ves', 'Kostolná-Záriečie', 'Kostolné',
        'Kostolné Kračany', 'Kostoľany nad Hornádom', 'Kostoľany pod Tribečom', 'Koš', 'Košariská', 'Košarovce', 'Košeca', 'Košecké Podhradie',
        'Košice', 'Košická Belá', 'Košická Polianka', 'Košické Oľšany', 'Košický Klečenov', 'Koškovce', 'Košolná', 'Košúty', 'Košťany nad Turcom',
        'Kotešová', 'Kotmanová', 'Kotrčiná Lúčka', 'Kováčová', 'Kováčová', 'Kováčovce', 'Koválov', 'Koválovec', 'Kovarce', 'Kozárovce', 'Kozelník',
        'Kozí Vrbovok', 'Kožany', 'Kožuchov', 'Kožuchovce', 'Kračúnovce', 'Krahule', 'Krajná Bystrá', 'Krajná Poľana', 'Krajná Porúbka', 'Krajné',
        'Krajné Čierno', 'Krakovany', 'Králiky', 'Kráľ', 'Kráľov Brod', 'Kráľova Lehota', 'Kráľová nad Váhom', 'Kráľová pri Senci', 'Kraľovany',
        'Kráľovce', 'Kráľovce-Krnišov', 'Kráľovičove Kračany', 'Kráľovský Chlmec', 'Kraskovo', 'Krásna Lúka', 'Krásna Ves', 'Krásno',
        'Krásno nad Kysucou', 'Krásnohorská Dlhá Lúka', 'Krásnohorské Podhradie', 'Krásnovce', 'Krásny Brod', 'Krasňany', 'Kravany', 'Kravany',
        'Kravany nad Dunajom', 'Krčava', 'Kremná', 'Kremnica', 'Kremnické Bane', 'Kristy', 'Krišľovce', 'Krišovská Liesková', 'Krivá', 'Krivany',
        'Kriváň', 'Krivé', 'Krivoklát', 'Krivosúd-Bodovka', 'Kríže', 'Krížová Ves', 'Krížovany', 'Križovany nad Dudváhom', 'Krná', 'Krnča',
        'Krokava', 'Krompachy', 'Krpeľany', 'Krškany', 'Krtovce', 'Kručov', 'Krupina', 'Krušetnica', 'Krušinec', 'Krušovce', 'Kružlov', 'Kružlová',
        'Kružná', 'Kružno', 'Kšinná', 'Kubáňovo', 'Kučín', 'Kučín', 'Kuchyňa', 'Kuklov', 'Kuková', 'Kukučínov', 'Kunerad', 'Kunešov',
        'Kunova Teplica', 'Kuraľany', 'Kurima', 'Kurimany', 'Kurimka', 'Kurov', 'Kusín', 'Kútniky', 'Kúty', 'Kuzmice', 'Kuzmice', 'Kvačany',
        'Kvačany', 'Kvakovce', 'Kvašov', 'Kvetoslavov', 'Kyjatice', 'Kyjov', 'Kynceľová', 'Kysak', 'Kyselica', 'Kysta', 'Kysucké Nové Mesto',
        'Kysucký Lieskovec', 'Láb', 'Lackov', 'Lacková', 'Lackovce', 'Lada', 'Ladce', 'Ladice', 'Ladmovce', 'Ladomerská Vieska', 'Ladomirov',
        'Ladomirová', 'Ladzany', 'Lakšárska Nová Ves', 'Lascov', 'Laskár', 'Lastomír', 'Lastovce', 'Laškovce', 'Látky', 'Lazany', 'Lazisko',
        'Lazy pod Makytou', 'Lažany', 'Lednica', 'Lednické Rovne', 'Legnava', 'Lehnice', 'Lehota', 'Lehota nad Rimavicou', 'Lehota pod Vtáčnikom',
        'Lehôtka', 'Lehôtka pod Brehmi', 'Lechnica', 'Lekárovce', 'Leles', 'Leľa', 'Lemešany', 'Lenartov', 'Lenartovce', 'Lendak', 'Lenka',
        'Lentvora', 'Leopoldov', 'Lesenice', 'Lesíček', 'Lesné', 'Lesnica', 'Leštiny', 'Lešť (vojenský obvod)', 'Letanovce', 'Letničie',
        'Leváre', 'Levice', 'Levkuška', 'Levoča', 'Ležiachov', 'Libichava', 'Licince', 'Ličartovce', 'Liesek', 'Lieskovany', 'Lieskovec',
        'Lieskovec', 'Liešno', 'Liešťany', 'Lietava', 'Lietavská Lúčka', 'Lietavská Svinná-Babkov', 'Likavka', 'Limbach', 'Lipany', 'Lipník',
        'Lipníky', 'Lipová', 'Lipová', 'Lipovany', 'Lipovce', 'Lipové', 'Lipovec', 'Lipovec', 'Lipovník', 'Lipovník', 'Liptovská Anna',
        'Liptovská Kokava', 'Liptovská Lúžna', 'Liptovská Osada', 'Liptovská Porúbka', 'Liptovská Sielnica', 'Liptovská Štiavnica',
        'Liptovská Teplá', 'Liptovská Teplička', 'Liptovské Beharovce', 'Liptovské Kľačany', 'Liptovské Matiašovce', 'Liptovské Revúce',
        'Liptovské Sliače', 'Liptovský Hrádok', 'Liptovský Ján', 'Liptovský Michal', 'Liptovský Mikuláš', 'Liptovský Ondrej', 'Liptovský Peter',
        'Liptovský Trnovec', 'Lisková', 'Lišov', 'Litava', 'Litmanová', 'Livina', 'Livinské Opatovce', 'Livov', 'Livovská Huta', 'Lodno',
        'Lok', 'Lokca', 'Lom nad Rimavicou', 'Lomná', 'Lomné', 'Lomnička', 'Lontov', 'Lopašov', 'Lopúchov', 'Lopušné Pažite', 'Lošonec',
        'Lovce', 'Lovča', 'Lovčica-Trubín', 'Lovinobaňa', 'Lozorno', 'Ložín', 'Lubeník', 'Lubina', 'Lúč na Ostrove', 'Lučatín', 'Lučenec',
        'Lúčina', 'Lučivná', 'Lúčka', 'Lúčka', 'Lúčka', 'Lúčka', 'Lúčky', 'Lúčky', 'Lúčky', 'Lúčnica nad Žitavou', 'Ludanice', 'Ludrová',
        'Luhyňa', 'Lúka', 'Lukačovce', 'Lukáčovce', 'Lukavica', 'Lukavica', 'Lukov', 'Lukovištia', 'Lúky', 'Lula', 'Lupoč', 'Lutila', 'Lutiše',
        'Lužany', 'Lužany pri Topli', 'Lužianky', 'Lysá pod Makytou', 'Lysica', 'Ľubá', 'Ľubela', 'Ľubica', 'Ľubietová', 'Ľubiša', 'Ľubochňa',
        'Ľuboreč', 'Ľuboriečka', 'Ľubotice', 'Ľubotín', 'Ľubovec', 'Ľudovítová', 'Ľutina', 'Ľutov', 'Macov', 'Mad', 'Madunice', 'Magnezitovce',
        'Machulince', 'Majcichov', 'Majere', 'Majerovce', 'Makov', 'Makovce', 'Malá Čalomija', 'Malá Čausa', 'Malá Čierna', 'Malá Domaša',
        'Malá Franková', 'Malá Hradná', 'Malá Ida', 'Malá Lehota', 'Malá Lodina', 'Malá Mača', 'Malá nad Hronom', 'Malá Poľana', 'Malá Tŕňa',
        'Malacky', 'Malachov', 'Málaš', 'Malatiná', 'Malatíny', 'Malcov', 'Malčice', 'Malé Borové', 'Malé Dvorníky', 'Malé Chyndice',
        'Malé Hoste', 'Malé Kosihy', 'Malé Kozmálovce', 'Malé Kršteňany', 'Malé Lednice', 'Malé Leváre', 'Malé Ludince', 'Malé Ozorovce',
        'Malé Raškovce', 'Malé Ripňany', 'Malé Straciny', 'Malé Trakany', 'Malé Uherce', 'Malé Vozokany', 'Malé Zálužie', 'Malé Zlievce',
        'Málinec', 'Malinová', 'Malinovo', 'Malužiná', 'Malý Cetín', 'Malý Čepčín', 'Malý Horeš', 'Malý Kamenec', 'Malý Krtíš', 'Malý Lapáš',
        'Malý Lipník', 'Malý Slavkov', 'Malý Slivník', 'Malý Šariš', 'Malženice', 'Mankovce', 'Maňa', 'Marcelová', 'Margecany', 'Marhaň',
        'Marianka', 'Markovce', 'Markuška', 'Markušovce', 'Maršová-Rašov', 'Martin', 'Martin nad Žitavou', 'Martinček', 'Martinová', 'Martovce',
        'Mašková', 'Maškovce', 'Matejovce nad Hornádom', 'Matiaška', 'Matiašovce', 'Matovce', 'Matúškovo', 'Matysová', 'Maťovské Vojkovce',
        'Medovarce', 'Medvedie', 'Medveďov', 'Medzany', 'Medzev', 'Medzianky', 'Medzibrod', 'Medzibrodie nad Oravou', 'Medzilaborce',
        'Melčice-Lieskové', 'Melek', 'Meliata', 'Mengusovce', 'Merašice', 'Merník', 'Mestečko', 'Mestisko', 'Mičakovce', 'Mierovo', 'Miezgovce',
        'Michajlov', 'Michal na Ostrove', 'Michal nad Žitavou', 'Michalková', 'Michalok', 'Michalová', 'Michalovce', 'Michaľany', 'Miklušovce',
        'Miková', 'Mikulášová', 'Mikušovce', 'Mikušovce', 'Milhosť', 'Miloslavov', 'Milpoš', 'Miňovce', 'Mirkovce', 'Miroľa', 'Mládzovo',
        'Mlynárovce', 'Mlynčeky', 'Mlynica', 'Mlynky', 'Mníchova Lehota', 'Mníšek nad Hnilcom', 'Mníšek nad Popradom', 'Moča', 'Močenok',
        'Močiar', 'Modra', 'Modra nad Cirochou', 'Modrany', 'Modrová', 'Modrovka', 'Modrý Kameň', 'Mojmírovce', 'Mojš', 'Mojtín', 'Mojzesovo',
        'Mokrá Lúka', 'Mokrance', 'Mokroluh', 'Mokrý Háj', 'Moldava nad Bodvou', 'Moravany', 'Moravany nad Váhom', 'Moravské Lieskové',
        'Moravský Svätý Ján', 'Most pri Bratislave', 'Mostová', 'Moškovec', 'Mošovce', 'Moštenica', 'Mošurov', 'Motešice', 'Motyčky', 'Môlča',
        'Mrázovce', 'Mučín', 'Mudroňovo', 'Mudrovce', 'Muľa', 'Muráň', 'Muránska Dlhá Lúka', 'Muránska Huta', 'Muránska Lehota',
        'Muránska Zdychava', 'Mútne', 'Mužla', 'Myjava', 'Myslina', 'Mýtna', 'Mýtne Ludany', 'Mýto pod Ďumbierom', 'Nacina Ves', 'Nadlice',
        'Naháč', 'Nálepkovo', 'Námestovo', 'Nána', 'Nandraž', 'Necpaly', 'Nedanovce', 'Nedašovce', 'Neded', 'Nededza', 'Nedožery-Brezany',
        'Nechválova Polianka', 'Nemce', 'Nemcovce', 'Nemcovce', 'Nemčice', 'Nemčiňany', 'Nemecká', 'Nemečky', 'Nemešany', 'Nemšová', 'Nenince',
        'Neporadza', 'Neporadza', 'Nesvady', 'Nesluša', 'Neverice', 'Nevidzany', 'Nevidzany', 'Nevoľné', 'Nezbudská Lúčka', 'Nimnica', 'Nitra',
        'Nitra nad Ipľom', 'Nitrianska Blatnica', 'Nitrianska Streda', 'Nitrianske Hrnčiarovce', 'Nitrianske Pravno', 'Nitrianske Rudno',
        'Nitrianske Sučany', 'Nitrica', 'Nižná', 'Nižná', 'Nižná Boca', 'Nižná Hutka', 'Nižná Jablonka', 'Nižná Jedľová', 'Nižná Kamenica',
        'Nižná Myšľa', 'Nižná Olšava', 'Nižná Pisaná', 'Nižná Polianka', 'Nižná Rybnica', 'Nižná Sitnica', 'Nižná Slaná', 'Nižná Voľa',
        'Nižné Ladičkovce', 'Nižné Nemecké', 'Nižné Repaše', 'Nižné Ružbachy', 'Nižný Čaj', 'Nižný Hrabovec', 'Nižný Hrušov', 'Nižný Klátov',
        'Nižný Komárnik', 'Nižný Kručov', 'Nižný Lánec', 'Nižný Mirošov', 'Nižný Orlík', 'Nižný Skálnik', 'Nižný Slavkov', 'Nižný Tvarožec',
        'Nižný Žipov', 'Nolčovo', 'Norovce', 'Nová Baňa', 'Nová Bašta', 'Nová Bošáca', 'Nová Bystrica', 'Nová Dedina', 'Nová Dedinka',
        'Nová Dubnica', 'Nová Kelča', 'Nová Lehota', 'Nová Lesná', 'Nová Ľubovňa', 'Nová Polhora', 'Nová Polianka', 'Nová Sedlica', 'Nová Ves',
        'Nová Ves nad Váhom', 'Nová Ves nad Žitavou', 'Nová Vieska', 'Nováčany', 'Nováky', 'Nové Hony', 'Nové Mesto nad Váhom', 'Nové Sady',
        'Nové Zámky', 'Novosad', 'Novoť', 'Nový Ruskov', 'Nový Salaš', 'Nový Svet', 'Nový Tekov', 'Nový Život', 'Nýrovce', 'Ňagov', 'Ňárad',
        'Obeckov', 'Obid', 'Obišovce', 'Oborín', 'Obručné', 'Obyce', 'Očkov', 'Očová', 'Odorín', 'Ohrady', 'Ohradzany', 'Ochodnica', 'Ochtiná',
        'Okoč', 'Okoličná na Ostrove', 'Okrúhle', 'Okružná', 'Olcnava', 'Olejníkov', 'Olešná', 'Olováry', 'Olšovany', 'Oľdza', 'Oľka', 'Oľšavce',
        'Oľšavica', 'Oľšavka', 'Oľšavka', 'Oľšinkov', 'Oľšov', 'Omastiná', 'Omšenie', 'Ondavka', 'Ondavské Matiašovce', 'Ondrašovce', 'Ondrašová',
        'Ondrejovce', 'Opátka', 'Opatovce', 'Opatovce nad Nitrou', 'Opatovská Nová Ves', 'Opava', 'Opiná', 'Opoj', 'Oponice', 'Oravce', 'Orávka',
        'Oravská Jasenica', 'Oravská Lesná', 'Oravská Polhora', 'Oravská Poruba', 'Oravský Biely Potok', 'Oravský Podzámok', 'Ordzovany', 'Orechová',
        'Orechová Potôň', 'Oravské Veselé', 'Oreské', 'Oreské', 'Orešany', 'Orlov', 'Orovnica', 'Ortuťová', 'Osádka', 'Osadné', 'Osikov', 'Oslany',
        'Osrblie', 'Ostrá Lúka', 'Ostratice', 'Ostrov', 'Ostrov', 'Ostrovany', 'Ostrý Grúň', 'Osturňa', 'Osuské', 'Oščadnica', 'Otrhánky', 'Otročok',
        'Ovčiarsko', 'Ovčie', 'Ozdín', 'Ožďany', 'Pača', 'Padáň', 'Padarovce', 'Pakostov', 'Palárikovo', 'Palín', 'Palota', 'Panické Dravce',
        'Paňa', 'Paňovce', 'Papín', 'Papradno', 'Parchovany', 'Parihuzovce', 'Párnica', 'Partizánska Ľupča', 'Partizánske', 'Pastovce', 'Pastuchov',
        'Pašková', 'Paština Závada', 'Pata', 'Pataš', 'Patince', 'Pavčina Lehota', 'Pavlice', 'Pavlová', 'Pavlova Ves', 'Pavlovce', 'Pavlovce',
        'Pavlovce nad Uhom', 'Pavľany', 'Pažiť', 'Pčoliné', 'Pečenice', 'Pečeňady', 'Pečeňany', 'Pečovská Nová Ves', 'Peder', 'Perín-Chym',
        'Pernek', 'Petkovce', 'Petrikovce', 'Petrová', 'Petrova Lehota', 'Petrova Ves', 'Petrovany', 'Petrovce', 'Petrovce', 'Petrovce',
        'Petrovce nad Laborcom', 'Petrovice', 'Petrovo', 'Pezinok', 'Piešťany', 'Pichne', 'Píla', 'Píla', 'Píla', 'Pinciná', 'Pinkovce',
        'Piskorovce', 'Pitelová', 'Plášťovce', 'Plavé Vozokany', 'Plavecké Podhradie', 'Plavecký Mikuláš', 'Plavecký Peter', 'Plavecký Štvrtok',
        'Plaveč', 'Plavnica', 'Plechotice', 'Pleš', 'Plešivec', 'Plevník-Drienové', 'Pliešovce', 'Ploské', 'Ploské', 'Pobedim', 'Počarová',
        'Počúvadlo', 'Podbiel', 'Podbranč', 'Podbrezová', 'Podhájska', 'Podhorany', 'Podhorany', 'Podhorany', 'Podhorie', 'Podhorie', 'Podhoroď',
        'Podhradie', 'Podhradie', 'Podhradie', 'Podhradík', 'Podkonice', 'Podkriváň', 'Podkylava', 'Podlužany', 'Podlužany', 'Podolie',
        'Podolínec', 'Podrečany', 'Podskalie', 'Podtureň', 'Podvysoká', 'Podzámčok', 'Pohorelá', 'Pohranice', 'Pohronská Polhora',
        'Pohronský Bukovec', 'Pohronský Ruskov', 'Pochabany', 'Pokryváč', 'Poliakovce', 'Polianka', 'Polichno', 'Polina', 'Poloma', 'Polomka',
        'Poltár', 'Poluvsie', 'Poľanovce', 'Poľany', 'Poľný Kesov', 'Pongrácovce', 'Poniky', 'Poprad', 'Poproč', 'Poproč', 'Popudinské Močidľany',
        'Poráč', 'Poriadie', 'Porostov', 'Poruba', 'Poruba pod Vihorlatom', 'Porúbka', 'Porúbka', 'Porúbka', 'Porúbka', 'Poša', 'Potok',
        'Potok', 'Potoky', 'Potôčky', 'Potônske Lúky', 'Potvorice', 'Považany', 'Považská Bystrica', 'Povina', 'Povoda', 'Povrazník', 'Pozba',
        'Pozdišovce', 'Pôtor', 'Praha', 'Prakovce', 'Prašice', 'Prašník', 'Pravenec', 'Pravica', 'Pravotice', 'Práznovce', 'Prečín', 'Predajná',
        'Predmier', 'Prenčov', 'Preseľany', 'Prestavlky', 'Prešov', 'Príbelce', 'Pribeník', 'Pribeta', 'Pribiš', 'Príbovce', 'Pribylina',
        'Priechod', 'Priekopa', 'Priepasné', 'Prietrž', 'Prietržka', 'Prievaly', 'Prievidza', 'Prihradzany', 'Príkra', 'Príslop', 'Prituľany',
        'Proč', 'Prochot', 'Prosačov', 'Prosiek', 'Prša', 'Pruské', 'Prusy', 'Pružina', 'Pstriná', 'Ptičie', 'Ptrukša', 'Pucov', 'Púchov',
        'Pukanec', 'Pusté Čemerné', 'Pusté Pole', 'Pusté Sady', 'Pusté Úľany', 'Pušovce', 'Rabča', 'Rabčice', 'Rad', 'Radatice', 'Radava',
        'Radimov', 'Radnovce', 'Radobica', 'Radoľa', 'Radoma', 'Radošina', 'Radošovce', 'Radošovce', 'Radôstka', 'Radvanovce',
        'Radvaň nad Dunajom', 'Radvaň nad Laborcom', 'Radzovce', 'Rafajovce', 'Rajčany', 'Rajec', 'Rajecká Lesná', 'Rajecké Teplice',
        'Rákoš', 'Rákoš', 'Raková', 'Rakovčík', 'Rakovec nad Ondavou', 'Rakovice', 'Rakovnica', 'Rakovo', 'Rakša', 'Rakúsy', 'Rakytník',
        'Rankovce', 'Rapovce', 'Raslavice', 'Rastislavice', 'Rašice', 'Ratka', 'Ratková', 'Ratkovce', 'Ratkovo', 'Ratkovská Lehota',
        'Ratkovská Suchá', 'Ratkovské Bystré', 'Ratnovce', 'Ratvaj', 'Ráztočno', 'Ráztoka', 'Ražňany', 'Reca', 'Regetovka', 'Rejdová',
        'Reľov', 'Remeniny', 'Remetské Hámre', 'Renčišov', 'Repejov', 'Repište', 'Rešica', 'Rešov', 'Revúca', 'Revúcka Lehota', 'Riečka',
        'Riečka', 'Richnava', 'Richvald', 'Rimavská Baňa', 'Rimavská Seč', 'Rimavská Sobota', 'Rimavské Brezovo', 'Rimavské Janovce',
        'Rimavské Zalužany', 'Rišňovce', 'Rohov', 'Rohovce', 'Rohožník', 'Rohožník', 'Rochovce', 'Rokycany', 'Rokytov', 'Rokytov pri Humennom',
        'Rokytovce', 'Rosina', 'Roškovce', 'Roštár', 'Rovensko', 'Rovinka', 'Rovné', 'Rovné', 'Rovné', 'Rovňany', 'Rozhanovce', 'Rozložná',
        'Roztoky', 'Rožkovany', 'Rožňava', 'Rožňavské Bystré', 'Rúbaň', 'Rudina', 'Rudinka', 'Rudinská', 'Rudlov', 'Rudná', 'Rudnianska Lehota',
        'Rudník', 'Rudník', 'Rudno', 'Rudno nad Hronom', 'Rudňany', 'Rumanová', 'Rumince', 'Runina', 'Ruská', 'Ruská Bystrá', 'Ruská Kajňa',
        'Ruská Nová Ves', 'Ruská Poruba', 'Ruská Volová', 'Ruská Voľa', 'Ruská Voľa nad Popradom', 'Ruskov', 'Ruskovce', 'Ruskovce',
        'Ruský Hrabovec', 'Ruský Potok', 'Ružiná', 'Ružindol', 'Ružomberok', 'Rybany', 'Rybky', 'Rybník', 'Rybník', 'Rykynčice', 'Sabinov',
        'Sačurov', 'Sedlice', 'Sádočné', 'Sady nad Torysou', 'Salka', 'Santovka', 'Sap', 'Sása', 'Sása', 'Sasinkovo', 'Sazdice', 'Sebedín-Bečov',
        'Sebedražie', 'Sebechleby', 'Seč', 'Sečianky', 'Sečovce', 'Sečovská Polianka', 'Sedliacka Dubová', 'Sedliská', 'Sedmerovec', 'Sejkov',
        'Sekule', 'Selce', 'Selce', 'Selce', 'Selec', 'Selice', 'Seľany', 'Semerovo', 'Senec', 'Seniakovce', 'Senica', 'Senné', 'Senné', 'Senohrad',
        'Seňa', 'Sereď', 'Sielnica', 'Sihelné', 'Sihla', 'Sikenica', 'Sikenička', 'Siladice', 'Silica', 'Silická Brezová', 'Silická Jablonica',
        'Sirk', 'Sirník', 'Skačany', 'Skalica', 'Skalité', 'Skalka nad Váhom', 'Skároš', 'Skerešovo', 'Sklabiná', 'Sklabinský Podzámok',
        'Sklabiňa', 'Sklené', 'Sklené Teplice', 'Skrabské', 'Skýcov', 'Sládkovičovo', 'Slančík', 'Slanec', 'Slanská Huta', 'Slanské Nové Mesto',
        'Slaská', 'Slatina', 'Slatina nad Bebravou', 'Slatinka nad Bebravou', 'Slatinské Lazy', 'Slatvina', 'Slavec', 'Slavkovce', 'Slavnica',
        'Slavoška', 'Slavošovce', 'Slepčany', 'Sliač', 'Sliepkovce', 'Slizké', 'Slivník', 'Slopná', 'Slovany', 'Slovenská Kajňa', 'Slovenská Ľupča',
        'Slovenská Nová Ves', 'Slovenská Ves', 'Slovenská Volová', 'Slovenské Ďarmoty', 'Slovenské Kľačany', 'Slovenské Krivé',
        'Slovenské Nové Mesto', 'Slovenské Pravno', 'Slovenský Grob', 'Slovinky', 'Sľažany', 'Smilno', 'Smižany', 'Smolenice', 'Smolinské',
        'Smolnícka Huta', 'Smolník', 'Smrdáky', 'Smrečany', 'Snakov', 'Snežnica', 'Snina', 'Socovce', 'Soblahov', 'Soboš', 'Sobotište',
        'Sobrance', 'Sokolce', 'Sokolovce', 'Sokoľ', 'Sokoľany', 'Solčany', 'Solčianky', 'Sološnica', 'Soľ', 'Soľnička', 'Soľník', 'Somotor',
        'Sopkovce', 'Spišská Belá', 'Spišská Nová Ves', 'Spišská Stará Ves', 'Spišská Teplica', 'Spišské Bystré', 'Spišské Hanušovce',
        'Spišské Podhradie', 'Spišské Tomášovce', 'Spišské Vlachy', 'Spišský Hrhov', 'Spišský Hrušov', 'Spišský Štiavnik', 'Spišský Štvrtok',
        'Stakčín', 'Stakčínska Roztoka', 'Stanča', 'Stankovany', 'Stankovce', 'Stará Bašta', 'Stará Bystrica', 'Stará Halič', 'Stará Huta',
        'Stará Kremnička', 'Stará Lehota', 'Stará Lesná', 'Stará Ľubovňa', 'Stará Myjava', 'Stará Turá', 'Stará Voda', 'Staré', 'Staré Hory',
        'Starina', 'Starý Hrádok', 'Starý Tekov', 'Staškov', 'Staškovce', 'Stebnícka Huta', 'Stebník', 'Stožok', 'Stráne pod Tatrami', 'Stránska',
        'Stránske', 'Stráňany', 'Stráňavy', 'Stratená', 'Stráža', 'Strážne', 'Strážske', 'Strečno', 'Streda nad Bodrogom', 'Stredné Plachtince',
        'Strekov', 'Strelníky', 'Stretava', 'Stretavka', 'Streženice', 'Strihovce', 'Stročín', 'Stropkov', 'Studená', 'Studenec', 'Studienka',
        'Stuľany', 'Stupava', 'Stupné', 'Sučany', 'Sudince', 'Súdovce', 'Suchá Dolina', 'Suchá Hora', 'Suchá nad Parnou', 'Sucháň', 'Suché',
        'Suché Brezovo', 'Suchohrad', 'Sukov', 'Sulín', 'Súlovce', 'Súľov-Hradná', 'Sušany', 'Sútor', 'Svätá Mária', 'Svätoplukovo', 'Svätuš',
        'Svätuše', 'Svätý Anton', 'Svätý Jur', 'Svätý Kríž', 'Svätý Peter', 'Svederník', 'Sverepec', 'Sveržov', 'Svetlice', 'Svidnička', 'Svidník',
        'Svinia', 'Svinica', 'Svinice', 'Svinná', 'Svit', 'Svodín', 'Svrbice', 'Svrčinovec', 'Šahy', 'Šajdíkove Humence', 'Šalgovce', 'Šalgočka',
        'Šalov', 'Šaľa', 'Šambron', 'Šamorín', 'Šamudovce', 'Šandal', 'Šarbov', 'Šarišská Poruba', 'Šarišská Trstená', 'Šarišské Bohdanovce',
        'Šarišské Čierne', 'Šarišské Dravce', 'Šarišské Jastrabie', 'Šarišské Michaľany', 'Šarišské Sokolovce', 'Šarišský Štiavnik', 'Šarkan',
        'Šarovce', 'Šašová', 'Šaštín-Stráže', 'Šávoľ', 'Šelpice', 'Šemetkovce', 'Šemša', 'Šenkvice', 'Šiatorská Bukovinka', 'Šiba', 'Šíd',
        'Šimonovce', 'Šindliar', 'Šintava', 'Šípkov', 'Šípkové', 'Širákov', 'Širkovce', 'Široké', 'Šišov', 'Šivetice', 'Šmigovec', 'Šoltýska',
        'Šoporňa', 'Špačince', 'Špania Dolina', 'Španie Pole', 'Šrobárová', 'Štefanov', 'Štefanov nad Oravou', 'Štefanová', 'Štefanovce',
        'Štefanovce', 'Štefanovičová', 'Štefurov', 'Šterusy', 'Štiavnické Bane', 'Štiavnička', 'Štiavnik', 'Štitáre', 'Štítnik', 'Štós', 'Štôla',
        'Štrba', 'Štrkovec', 'Štúrovo', 'Štvrtok', 'Štvrtok na Ostrove', 'Šuja', 'Šuľa', 'Šumiac', 'Šuňava', 'Šurany', 'Šurianky', 'Šurice',
        'Šúrovce', 'Šútovo', 'Šútovce', 'Švábovce', 'Švedlár', 'Švošov', 'Tachty', 'Tajná', 'Tajov', 'Tarnov', 'Tatranská Javorina', 'Tašuľa',
        'Tehla', 'Tekolďany', 'Tekovská Breznica', 'Tekovské Lužany', 'Tekovské Nemce', 'Tekovský Hrádok', 'Telgárt', 'Telince', 'Temeš',
        'Teplička', 'Teplička nad Váhom', 'Tepličky', 'Teplý Vrch', 'Terany', 'Terchová', 'Teriakovce', 'Terňa', 'Tesáre', 'Tesárske Mlyňany',
        'Tešedíkovo', 'Tibava', 'Tichý Potok', 'Timoradza', 'Tisinec', 'Tisovec', 'Tlmače', 'Točnica', 'Tokajík', 'Tomášikovo', 'Tomášov',
        'Tomášovce', 'Tomášovce', 'Topoľa', 'Topoľčany', 'Topoľčianky', 'Topoľnica', 'Topoľníky', 'Topoľovka', 'Toporec', 'Tornaľa', 'Torysa',
        'Torysky', 'Tovarné', 'Tovarnianska Polianka', 'Tovarníky', 'Tôň', 'Trakovice', 'Trávnica', 'Trávnik', 'Trebatice', 'Trebejov',
        'Trebeľovce', 'Trebichava', 'Trebišov', 'Trebostovo', 'Trebušovce', 'Trenč', 'Trenčianska Teplá', 'Trenčianska Turná',
        'Trenčianske Bohuslavice', 'Trenčianske Jastrabie', 'Trenčianske Mitice', 'Trenčianske Stankovce', 'Trenčianske Teplice', 'Trenčín',
        'Trhová Hradská', 'Trhovište', 'Trnava', 'Trnavá Hora', 'Trnava pri Laborci', 'Trnávka', 'Trnávka', 'Trnkov', 'Trnovec',
        'Trnovec nad Váhom', 'Trnovo', 'Tročany', 'Trpín', 'Trstená', 'Trstená na Ostrove', 'Trstené', 'Trstené pri Hornáde', 'Trstice',
        'Trstín', 'Trsťany', 'Tŕnie', 'Tuhár', 'Tuhrina', 'Tuchyňa', 'Tulčík', 'Tupá', 'Turá', 'Turany', 'Turany nad Ondavou', 'Turcovce',
        'Turček', 'Turčianky', 'Turčianska Štiavnička', 'Turčianske Jaseno', 'Turčianske Kľačany', 'Turčianske Teplice', 'Turčiansky Ďur',
        'Turčiansky Peter', 'Turčok', 'Turecká', 'Tureň', 'Turie', 'Turík', 'Turnianska Nová Ves', 'Turňa nad Bodvou', 'Turová', 'Turzovka',
        'Tušice', 'Tušická Nová Ves', 'Tužina', 'Tvarožná', 'Tvrdomestice', 'Tvrdošín', 'Tvrdošovce', 'Ťapešovo', 'Ubľa', 'Úbrež', 'Udavské',
        'Udiča', 'Údol', 'Uhliská', 'Úhorná', 'Uhorská Ves', 'Uhorské', 'Uhrovec', 'Uhrovské Podhradie', 'Ulič', 'Uličské Krivé', 'Uloža',
        'Úľany nad Žitavou', 'Unín', 'Uňatín', 'Urmince', 'Utekáč', 'Uzovce', 'Uzovská Panica', 'Uzovské Pekľany', 'Uzovský Šalgov', 'Vaďovce',
        'Vagrinec', 'Váhovce', 'Vajkovce', 'Valaliky', 'Valaská', 'Valaská Belá', 'Valaská Dubová', 'Valaškovce (vojenský obvod)', 'Valča',
        'Valentovce', 'Valice', 'Valkovce', 'Vaľkovňa', 'Vaniškovce', 'Vápeník', 'Varadka', 'Varechovce', 'Varhaňovce', 'Varín', 'Vasiľov',
        'Vavrečka', 'Vavrinec', 'Vavrišovo', 'Važec', 'Včelince', 'Večelkov', 'Vechec', 'Velčice', 'Veličná', 'Velušovce', 'Veľaty',
        'Veľká Čalomija', 'Veľká Čausa', 'Veľká Čierna', 'Veľká Dolina', 'Veľká Franková', 'Veľká Hradná', 'Veľká Ida', 'Veľká Lehota',
        'Veľká Lesná', 'Veľká Lodina', 'Veľká Lomnica', 'Veľká Lúka', 'Veľká Mača', 'Veľká nad Ipľom', 'Veľká Paka', 'Veľká Tŕňa',
        'Veľká Ves', 'Veľká Ves nad Ipľom', 'Veľké Bierovce', 'Veľké Blahovo', 'Veľké Borové', 'Veľké Dravce', 'Veľké Držkovce', 'Veľké Dvorany',
        'Veľké Dvorníky', 'Veľké Hoste', 'Veľké Chlievany', 'Veľké Chyndice', 'Veľké Kapušany', 'Veľké Kosihy', 'Veľké Kostoľany',
        'Veľké Kozmálovce', 'Veľké Kršteňany', 'Veľké Leváre', 'Veľké Lovce', 'Veľké Ludince', 'Veľké Orvište', 'Veľké Ozorovce',
        'Veľké Pole', 'Veľké Raškovce', 'Veľké Revištia', 'Veľké Ripňany', 'Veľké Rovné', 'Veľké Slemence', 'Veľké Straciny',
        'Veľké Teriakovce', 'Veľké Trakany', 'Veľké Turovce', 'Veľké Uherce', 'Veľké Úľany', 'Veľké Vozokany',
        'Veľké Zálužie', 'Veľké Zlievce', 'Veľkrop', 'Veľký Biel', 'Veľký Blh', 'Veľký Cetín', 'Veľký Čepčín', 'Veľký Ďur', 'Veľký Folkmar',
        'Veľký Grob', 'Veľký Horeš', 'Veľký Kamenec', 'Veľký Klíž', 'Veľký Krtíš', 'Veľký Kýr', 'Veľký Lapáš', 'Veľký Lipník', 'Veľký Lom',
        'Veľký Meder', 'Veľký Slavkov', 'Veľký Slivník', 'Veľký Šariš', 'Veľopolie', 'Vernár', 'Veselé', 'Veterná Poruba', 'Vidiná', 'Vieska',
        'Vieska', 'Vieska nad Žitavou', 'Vígľaš', 'Vígľašská Huta-Kalinka', 'Vikartovce', 'Vinica', 'Viničky', 'Viničné', 'Vinné', 'Vinodol',
        'Vinohrady nad Váhom', 'Vinosady', 'Virt', 'Vislanka', 'Vislava', 'Visolaje', 'Višňov', 'Višňové', 'Višňové', 'Vištuk', 'Vitanová',
        'Vítkovce', 'Víťaz', 'Víťazovce', 'Vlača', 'Vladiča', 'Vlachovo', 'Vlachy', 'Vlčany', 'Vlčkovce', 'Vlkanová', 'Vlkas', 'Vlková',
        'Vlkovce', 'Vlky', 'Voderady', 'Vojany', 'Vojčice', 'Vojka', 'Vojka nad Dunajom', 'Vojkovce', 'Vojnatina', 'Vojňany', 'Vojtovce',
        'Volica', 'Volkovce', 'Voľa', 'Voznica', 'Vozokany', 'Vozokany', 'Vráble', 'Vrádište', 'Vrakúň', 'Vranov nad Topľou', 'Vrbnica',
        'Vrbov', 'Vrbovce', 'Vrbová nad Váhom', 'Vrbové', 'Vrbovka', 'Vrchteplá', 'Vrícko', 'Vršatské Podhradie', 'Vrútky', 'Vtáčkovce',
        'Výborná', 'Výčapy-Opatovce', 'Vydrany', 'Vydrná', 'Vydrník', 'Vyhne', 'Východná', 'Výrava', 'Vysočany', 'Vysoká', 'Vysoká',
        'Vysoká nad Kysucou', 'Vysoká nad Uhom', 'Vysoká pri Morave', 'Vysoké Tatry', 'Vyškovce', 'Vyškovce nad Ipľom', 'Vyšná Boca',
        'Vyšná Hutka', 'Vyšná Jablonka', 'Vyšná Jedľová', 'Vyšná Kamenica', 'Vyšná Myšľa', 'Vyšná Olšava', 'Vyšná Pisaná', 'Vyšná Polianka',
        'Vyšná Rybnica', 'Vyšná Sitnica', 'Vyšná Slaná', 'Vyšná Šebastová', 'Vyšná Voľa', 'Vyšné Ladičkovce', 'Vyšné nad Hronom', 'Vyšné Nemecké',
        'Vyšné Remety', 'Vyšné Repaše', 'Vyšné Ružbachy', 'Vyšné Valice', 'Vyšný Čaj', 'Vyšný Hrabovec', 'Vyšný Hrušov', 'Vyšný Kazimír',
        'Vyšný Klátov', 'Vyšný Komárnik', 'Vyšný Kručov', 'Vyšný Kubín', 'Vyšný Medzev', 'Vyšný Mirošov', 'Vyšný Orlík', 'Vyšný Skálnik',
        'Vyšný Slavkov', 'Vyšný Tvarožec', 'Vyšný Žipov', 'Zábiedovo', 'Záborie', 'Záborské', 'Zádiel', 'Zádor', 'Záhor', 'Záhorce', 'Záhorie',
        'Záhorská Ves', 'Záhradné', 'Zacharovce', 'Zákamenné', 'Zákopčie', 'Zalaba', 'Zálesie', 'Zálesie', 'Zalužice', 'Zamarovce', 'Zámutov',
        'Záriečie', 'Záskalie', 'Zatín', 'Závada', 'Závada', 'Závada', 'Závadka', 'Závadka', 'Závadka', 'Zavar', 'Závažná Poruba', 'Závod',
        'Zázrivá', 'Zbehňov', 'Zbehy', 'Zboj', 'Zbojné', 'Zborov', 'Zborov nad Bystricou', 'Zbrojníky', 'Zbudská Belá', 'Zbudské Dlhé', 'Zbudza',
        'Zbyňov', 'Zeleneč', 'Zemianska Olča', 'Zemianske Kostoľany', 'Zemianske Podhradie', 'Zemianske Sady', 'Zemiansky Vrbovok', 'Zemné',
        'Zemplín', 'Zemplínska Nová Ves', 'Zemplínska Široká', 'Zemplínska Teplica', 'Zemplínske Hámre', 'Zemplínske Hradište',
        'Zemplínske Jastrabie', 'Zemplínske Kopčany', 'Zemplínsky Branč', 'Zlatá Baňa', 'Zlatá Idka', 'Zlaté', 'Zlaté Klasy', 'Zlaté Moravce',
        'Zlatná na Ostrove', 'Zlatník', 'Zlatníky', 'Zlatno', 'Zlatno', 'Zliechov', 'Zohor', 'Zombor', 'Zubák', 'Zuberec', 'Zubné',
        'Zubrohlava', 'Zvolen', 'Zvolenská Slatina', 'Zvončín', 'Žabokreky', 'Žabokreky nad Nitrou', 'Žakarovce', 'Žakovce', 'Žalobín',
        'Žarnov', 'Žarnovica', 'Žaškov', 'Žbince', 'Ždaňa', 'Ždiar', 'Žehňa', 'Žehra', 'Železná Breznica', 'Železník', 'Želiezovce',
        'Želmanovce', 'Želovce', 'Žemberovce', 'Žemliare', 'Žiar', 'Žiar', 'Žiar nad Hronom', 'Žibritov', 'Žihárec', 'Žikava', 'Žilina',
        'Žíp', 'Žipov', 'Žirany', 'Žitavany', 'Žitavce', 'Žitná-Radiša', 'Žlkovce', 'Župčany', 'Župkov'
    );

    protected static $buildingNumber = array('#####', '####', '###');
    protected static $streetSuffix = array(
        'Alley','Avenue','Branch','Bridge','Brook','Brooks','Burg','Burgs','Bypass','Camp','Canyon','Cape','Causeway','Center','Centers','Circle','Circles','Cliff','Cliffs','Club','Common','Corner','Corners','Course','Court','Courts','Cove','Coves','Creek','Crescent','Crest','Crossing','Crossroad','Curve','Dale','Dam','Divide','Drive','Drive','Drives','Estate','Estates','Expressway','Extension','Extensions','Fall','Falls','Ferry','Field','Fields','Flat','Flats','Ford','Fords','Forest','Forge','Forges','Fork','Forks','Fort','Freeway','Garden','Gardens','Gateway','Glen','Glens','Green','Greens','Grove','Groves','Harbor','Harbors','Haven','Heights','Highway','Hill','Hills','Hollow','Inlet','Inlet','Island','Island','Islands','Islands','Isle','Isle','Junction','Junctions','Key','Keys','Knoll','Knolls','Lake','Lakes','Land','Landing','Lane','Light','Lights','Loaf','Lock','Locks','Locks','Lodge','Lodge','Loop','Mall','Manor','Manors','Meadow','Meadows','Mews','Mill','Mills','Mission','Mission','Motorway','Mount','Mountain','Mountain','Mountains','Mountains','Neck','Orchard','Oval','Overpass','Park','Parks','Parkway','Parkways','Pass','Passage','Path','Pike','Pine','Pines','Place','Plain','Plains','Plains','Plaza','Plaza','Point','Points','Port','Port','Ports','Ports','Prairie','Prairie','Radial','Ramp','Ranch','Rapid','Rapids','Rest','Ridge','Ridges','River','Road','Road','Roads','Roads','Route','Row','Rue','Run','Shoal','Shoals','Shore','Shores','Skyway','Spring','Springs','Springs','Spur','Spurs','Square','Square','Squares','Squares','Station','Station','Stravenue','Stravenue','Stream','Stream','Street','Street','Streets','Summit','Summit','Terrace','Throughway','Trace','Track','Trafficway','Trail','Trail','Tunnel','Tunnel','Turnpike','Turnpike','Underpass','Union','Unions','Valley','Valleys','Via','Viaduct','View','Views','Village','Village','Villages','Ville','Vista','Vista','Walk','Walks','Wall','Way','Ways','Well','Wells'
    );
    protected static $postcode = array('### ##');

    protected static $country = array(
        'Afganistan', 'Albánsko', 'Alžírsko', 'Andorra', 'Angola', 'Antigua a Barbuda', 'Argentína', 'Arménsko', 'Austrália', 'Azerbajdžan',
        'Bahamy', 'Bahrajn', 'Bangladéš', 'Barbados', 'Belgicko', 'Belize', 'Benin', 'Bhután', 'Bielorusko', 'Bolívia', 'Bosna a Hercegovina',
        'Botswana', 'Brazília', 'Brunej', 'Bulharsko', 'Burkina', 'Burundi', 'Cyprus', 'Čad', 'Česko', 'Čierna Hora', 'Čile', 'Čína', 'Dánsko',
        'Dominika', 'Dominikánska republika', 'Džibutsko', 'Egypt', 'Ekvádor', 'Eritrea', 'Estónsko', 'Etiópia', 'Fidži', 'Filipíny', 'Fínsko',
        'Francúzsko', 'Gabon', 'Gambia', 'Ghana', 'Grécko', 'Grenada', 'Gruzínsko', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti',
        'Holandsko', 'Honduras', 'Chorvátsko', 'India', 'Indonézia', 'Irak', 'Irán', 'Írsko', 'Island', 'Izrael', 'Jamajka', 'Japonsko', 'Jemen',
        'Jordánsko', 'Južná Afrika', 'Južný Sudán', 'Kambodža', 'Kamerun', 'Kanada', 'Kapverdy', 'Katar', 'Kazachstan', 'Keňa', 'Kirgizsko',
        'Kiribati', 'Kolumbia', 'Komory', 'Kongo', 'Konžská demokratická republika', 'Kórejská ľudovodemokratická republika', 'Kórejská republika',
        'Kostarika', 'Kuba', 'Kuvajt', 'Laos', 'Lesotho', 'Libanon', 'Libéria', 'Líbya', 'Lichtenštajnsko', 'Litva', 'Lotyšsko', 'Luxembursko',
        'Macedónsko', 'Madagaskar', 'Maďarsko', 'Malajzia', 'Malawi', 'Maldivy', 'Mali', 'Malta', 'Maroko', 'Marshallove ostrovy', 'Maurícius',
        'Mauritánia', 'Mexiko', 'Mikronézia', 'Mjanmarsko', 'Moldavsko', 'Monako', 'Mongolsko', 'Mozambik', 'Namíbia', 'Nemecko', 'Nepál', 'Niger',
        'Nigéria', 'Nikaragua', 'Nórsko', 'Nový Zéland', 'Omán', 'Pakistan', 'Palau', 'Palestína', 'Panama', 'Papua-Nová Guinea', 'Paraguaj', 'Peru',
        'Pobrežie Slonoviny', 'Poľsko', 'Portugalsko', 'Rakúsko', 'Rovníková Guinea', 'Rumunsko', 'Rusko', 'Rwanda', 'Salvádor', 'Samoa',
        'San Maríno', 'Saudská Arábia', 'Senegal', 'Seychely', 'Sierra Leone', 'Singapur', 'Slovinsko', 'Somálsko', 'Spojené arabské emiráty',
        'Spojené kráľovstvo', 'Spojené štáty', 'Srbsko', 'Srí Lanka', 'Stredoafrická republika', 'Sudán', 'Surinam', 'Svätá Lucia',
        'Svätý Krištof a Nevis', 'Svätý Tomáš a Princov ostrov', 'Svätý Vincent a Grenadíny', 'Svazijsko', 'Sýria', 'Šalamúnove ostrovy',
        'Španielsko', 'Švajčiarsko', 'Švédsko', 'Tadžikistan', 'Taliansko', 'Tanzánia', 'Thajsko', 'Togo', 'Tonga', 'Trinidad a Tobago',
        'Tunisko', 'Turecko', 'Turkménsko', 'Tuvalu', 'Uganda', 'Ukrajina', 'Uruguaj', 'Uzbekistan', 'Vanuatu', 'Vatikán', 'Venezuela', 'Vietnam',
        'Východný Timor', 'Zambia', 'Zimbabwe', 'Zvrchovaný vojenský špitálsky rád sv. Jána Jeruzalemského z Ródu a Malty'
    );
    protected static $cityFormats = array(
        '{{cityName}}'
    );
    protected static $streetNameFormats = array(
        '{{firstName}} {{streetSuffix}}',
        '{{lastName}} {{streetSuffix}}'
    );
    protected static $streetAddressFormats = array(
        '{{streetName}} {{buildingNumber}}'
    );

    protected static $addressFormats = array(
        '{{streetAddress}}\n {{postcode}}\n {{city}}',
    );

    public static function cityName()
    {
        return static::randomElement(static::$cityName);
    }
}

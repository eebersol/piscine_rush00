<?PHP

if (!file_exists("data_base"))
	mkdir("data_base", 0777);
if (!file_exists("data_base/commands.csv"))
	touch("data_base/commands.csv", 0777);
if (!file_exists("data_base/product.csv"))
{
	touch("data_base/product.csv", 0777);
	file_put_contents("data_base/product.csv", "GLOBE PINNER,179EUR,\",longboard\",https://cdn.skatedeluxe.com/images/product_images/thumbnail_images/78209_0_Globe_PinnerDropThrough41104cm.jpg
GLOBE - THE CUTLER,200EUR,\",longboard\",https://cdn.skatedeluxe.com/images/product_images/thumbnail_images/101783_0_Globe_TheCutler365927cm.jpg
GLOBE - BYRON BAY,140EUR,\",longboard\",https://cdn.skatedeluxe.com/images/product_images/thumbnail_images/91962_0_Globe_ByronBay431092cm.jpg
WOOD CRUISER,100EUR,\",cruiser\",https://cdn.skatedeluxe.com/images/product_images/thumbnail_images/94655_0_skatedeluxe_SurfblendWood.jpg
CRUISER SK8DLX,70EUR,\",cruiser\",https://cdn.skatedeluxe.com/images/product_images/thumbnail_images/94868_0_SK8DLX_AlmostNaked27.jpg
LANDYACHTZ DINGHY,170EUR,\",cruiser\",https://cdn.skatedeluxe.com/images/product_images/thumbnail_images/95548_0_Landyachtz_Dinghy285724cm.jpg
ELEMENT PHASE,29EUR,\",visserie,cruiser\",https://cdn.skatedeluxe.com/images/product_images/thumbnail_images/102092_0_Element_PhaseIIILandLines50.jpg
THUNDER,49EUR,\",visserie,cruiser\",https://cdn.skatedeluxe.com/images/product_images/thumbnail_images/102091_0_Thunder_149HighLightsAcademy.jpg
ELEMENT FULL,34EUR,\",visserie,cruiser\",https://cdn.skatedeluxe.com/images/product_images/thumbnail_images/102093_0_Element_FullTree550.jpg
BEAR GRIZZLY,32EUR,\",visserie,cruiser\",https://www.longskate-boardshop.com/444-large_default/truck-paris-v2-silver-violet-180-mm-50-degres.jpg
CALIBER,33EUR,\",visserie,cruiser\",https://cdn.skatedeluxe.com/images/product_images/thumbnail_images/78990_0_Caliber_II50184mm.jpg
PARIS V2 180MM 50° TRUCK ,33EUR,\",visserie,cruiser\",http://www.socialskateboarding.com/assets/products/403366/full/1tpar280500kfkf.jpg
");
}
if (!file_exists("private"))
	mkdir("private", 0744);
if (!file_exists("private/users"))
	touch("private/users", 0744);
if (!file_exists("private/admins"))
{
	$data = 'a:4:{i:0;a:7:{s:5:"login";s:5:"admin";s:4:"mail";s:15:"admin@admin.com";s:8:"password";s:128:"6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94";s:9:"firstname";s:3:"LOL";s:8:"lastname";s:3:"LOL";s:11:"postal_code";s:8:"09876543";s:5:"phone";s:14:"09876543234567";}i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}';
	touch("private/admins", 0744);
	file_put_contents("private/admins", $data, FILE_APPEND);
}
?>

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="review-block">
	<div class="review-text">
		<? if($arResult["DETAIL_TEXT"]):?>
			<div class="review-text-cont">
				<?echo $arResult["DETAIL_TEXT"];?>
			</div>
		<? else:?>
			<div class="review-text-cont">
				<?echo $arResult["PREVIEW_TEXT"];?>
			</div>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
			<div class="review-autor">
				<?=$arResult["NAME"]?>, 
		<?endif;?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<?=$arResult["DISPLAY_ACTIVE_FROM"]?>., 
		<?endif;?>
		<? echo $arResult["PROPERTIES"]["POSITION"]["VALUE"]; ?>, <? echo $arResult["PROPERTIES"]["COMPANY"]["VALUE"]; ?>.
			</div>
	</div>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<div style="clear: both;" class="review-img-wrap">
			<img
				class="detail_picture"
				border="0"
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
				height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
		</div>
	<? else: ?>
		<div style="clear: both;" class="review-img-wrap">
			<img
				class="detail_picture"
				border="0"
				src="/upload/images/no_photo.jpg"
				alt="<?=$arResult["NAME"]?>"
			/>
		</div>
	<?endif;?>
</div>
<? if($arResult["DISPLAY_PROPERTIES"]['FILES']): ?>
<div class="exam-review-doc">
	<p>Документы:</p>
	<? if(is_array($arResult["DISPLAY_PROPERTIES"]['FILES']["FILE_VALUE"][0])): ?>
		<? foreach ($arResult["DISPLAY_PROPERTIES"]['FILES']["FILE_VALUE"] as $arProp): ?>
			<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="/upload/images/pdf_ico_40.png"><a href="<?= $arProp["SRC"]; ?>" download><?= $arProp["ORIGINAL_NAME"]; ?></a></div>
		<? endforeach ?>
	<? else: ?>
		<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="/upload/images/pdf_ico_40.png"><a href="<?= $arResult["DISPLAY_PROPERTIES"]['FILES']["FILE_VALUE"]["SRC"]; ?>" download><?= $arResult["DISPLAY_PROPERTIES"]['FILES']["FILE_VALUE"]["ORIGINAL_NAME"]; ?></a></div>
	<? endif ?>
</div>
<hr>
<? endif ?>
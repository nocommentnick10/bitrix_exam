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

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<? $i = 0; ?>

<?foreach($arResult["ITEMS"] as $arItem):?>

	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<div class="review-block" id="<?= $this->GetEditAreaId($arItem["ID"]); ?>">
		<div class="review-text">

			<div class="review-block-title">
				<div class="review-text">
					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
						<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
							<span class="review-block-name"><a href="<?echo $arItem["DETAIL_PAGE_URL"] ?>"><?echo $arItem["NAME"]?></a></span>
						<?else:?>
							<span class="review-block-name"><a href=""><?echo $arItem["NAME"];?></a></span>
						<?endif;?>
					<?endif;?>
					<span class="review-block-description">
						<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
							<?= $arItem["DISPLAY_ACTIVE_FROM"] ?> г.,
						<?endif?>
						<? echo $arResult["ITEMS"][$i]["PROPERTIES"]["POSITION"]["VALUE"]; ?>, <? echo $arResult["ITEMS"][$i]["PROPERTIES"]["COMPANY"]["VALUE"]; ?>
					</span>
					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<div class="review-text-cont">
							<?echo $arItem["PREVIEW_TEXT"];?>
						</div>
					<?endif;?>
				</div>
			</div>
			

		</div>

			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<div class="review-img-wrap"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"></a></div>
				<?else:?>
					<div class="review-img-wrap"><a href=""><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"></a></div>
				<?endif;?>
			<? else: ?>
				<div class="review-img-wrap"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="/upload/images/no_photo.jpg" alt="<?=$arItem["NAME"]?>"></a></div>
			<?endif?>
	</div>

	<? $i++; ?>

<? endforeach ?>

<?php if ($arParams['DISPLAY_BOTTOM_PAGER']): /* постраничная навигация внизу */  ?>
    <?= $arResult['NAV_STRING']; ?>
<?php endif; ?>
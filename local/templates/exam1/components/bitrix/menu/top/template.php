<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

if (empty($arResult["ALL_ITEMS"]))
	return;

\Bitrix\Main\UI\Extension::load(['ui.design-tokens']);

?>
		<ul class="">
			<li class="main-page"><a href="/">Главная</a></li>
		<?foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns):
			if($arResult["ALL_ITEMS"][$itemID]['PERMISSION'] == 'D') continue; ?>     <!-- first level-->
			<li>
				<a href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>" >
						<?=$arResult["ALL_ITEMS"][$itemID]["TEXT"]?>
				</a>
			<?if (is_array($arColumns) && !empty($arColumns)):?>
					<?foreach($arColumns as $key=>$arRow):?>
						<ul>
							<? $menu_top_text = $APPLICATION->GetDirProperty('menu_top_text', $arResult["ALL_ITEMS"][$itemID]['LINK']);
								if($menu_top_text) echo '<div class="menu-text">'. $menu_top_text .'</div>';
							?>
						<?foreach($arRow as $itemIdLevel_2=>$arLevel_3):
							if($arResult["ALL_ITEMS"][$itemIdLevel_2]['PERMISSION'] == 'D') continue; ?>  <!-- second level-->
							<li>
								<a href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>" >
									<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?>
								</a>
							<?if (is_array($arLevel_3) && !empty($arLevel_3)):?>
								<ul>
									<? $menu_top_text = $APPLICATION->GetDirProperty('menu_top_text', $arResult["ALL_ITEMS"][$itemIdLevel_2]['LINK']);
										if($menu_top_text) echo '<div class="menu-text">'. $menu_top_text .'</div>';
									?>
								<?foreach($arLevel_3 as $itemIdLevel_3):?>	<!-- third level-->
									<li>
										<a href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["LINK"]?>" >
											<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["TEXT"]?>
										</a>
									</li>
								<?endforeach;?>
								</ul>
							<?endif?>
							</li>
						<?endforeach;?>
						</ul>
					<?endforeach;?>
			<?endif?>
			</li>
		<?endforeach;?>
		</ul>
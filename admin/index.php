<?php
if (isset($_POST['update'])) {
    $response = hostjane_updateConfig($_POST);
}

$plugin = hostjane_getConfig();
$themes = hostjane_getThemes();
?>
<div class="hostjane-admin">
    <div class="hostjane-admin-header">
        <h2>Tip my work on HostJane</h2>
        <p>Accept payments from fans and clients from your website.</p>
    </div>

    <div class="hostjane-admin-container">
        <div class="hostjane-admin-settings">
            <form method="post">
                <div class="mb">
                    <p class="legend">Your HostJane username</p>
                    <div class="username-container">
                        <span id="studio_avatar"></span>
                        <input type="text" name="username" placeholder="Enter username" value="<?php if ($plugin) { echo esc_html($plugin->username); } ?>" required>
                    </div>
                    <span class="help help-danger" id="studio_doesnot_exists">This user does not exist.</span>
                    <span class="help">You must register free as a seller on HostJane to accept tips. <a href="https://www.hostjane.com/sell" target="_blank">Open a studio</a> to start selling your skill today.</span>
                </div>

                <?php if ($plugin->username) { ?>
                    <script type="text/javascript">
                        hostjane_checkSellerData('<?php echo esc_html($plugin->username); ?>');
                    </script>
                <?php } ?>

                <div class="mb">
                    <p class="legend">Color theme</p>
                    <div class="colors" id="colors">
                        <input type="hidden" name="theme" id="set_theme" value="<?php echo esc_html($plugin->theme); ?>">
                        <?php foreach ($themes as $theme) { ?>
                            <div data-id="<?php echo esc_html($theme); ?>"
                                onclick="hostjane_selectTheme('<?php echo esc_html($theme); ?>');"
                                class="hostjane-color hostjane-<?php echo esc_html($theme); ?> <?php if ($plugin->theme == $theme) { echo 'selected'; } ?>">
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="mb">
                    <p class="legend">Align</p>
                    <select name="align" id="align" required onchange="hostjane_selectAlign(this);">
                        <option value="right" <?php if ($plugin->align == 'right') { echo 'selected'; } ?>>Right</option>
                        <option value="left" <?php if ($plugin->align == 'left') { echo 'selected'; } ?>>Left</option>
                    </select>
                </div>

                <div class="mb">
                    <p class="legend">Side spacing (px)</p>
                    <input type="number" name="side_spacing" required
                        id="side_spacing" placeholder="18" min="0" max="200"
                        onkeyup="hostjane_setSideSpacing(this)" onclick="hostjane_setSideSpacing(this)"
                        value="<?php if ($plugin) { echo esc_html($plugin->side_spacing); } ?>">
                </div>

                <div class="mb">
                    <p class="legend">Bottom spacing (px)</p>
                    <input type="number" name="bottom_spacing" required
                        id="bottom_spacing" placeholder="18" min="0" max="200"
                        onkeyup="hostjane_setBottomSpacing(this)" onclick="hostjane_setBottomSpacing(this)"
                        value="<?php if ($plugin) { echo esc_html($plugin->bottom_spacing); } ?>">
                </div>

                <div class="mb">
                    <label>
                        <input name="enabled" type="checkbox" value="1" <?php if ($plugin->enabled == 1) { echo 'checked'; } ?>>
                        <span>Enable tip button</span>
                    </label>
                </div>

                <div class="mb">
                    <button type="submit" class="submit-btn btn hostjane-<?php echo esc_html($plugin->theme); ?>" name="update">Save changes</button>
                </div>
            </form>
        </div>

        <div class="hostjane-admin-preview">
            <iframe id="preview" src="<?php echo get_site_url(); ?>?disable_tip=true"></iframe>

            <div class="hostjane-plugin hostjane-<?php echo esc_html($plugin->theme); ?>-theme"
                style="position: absolute !important; bottom: <?php echo esc_html($plugin->bottom_spacing); ?>px; <?php echo esc_html($plugin->align); ?>: <?php echo esc_html($plugin->side_spacing); ?>px;">
                <div class="hostjane-plugin-container opened <?php if ($plugin->align == 'left') { ?>left-sided<?php } ?>" style="border-radius: <?php echo esc_html($plugin->border_radius); ?>px;">
                    <span class="hostjane-plugin-container-title">Tip me on HostJane</span>
                    <div class="hostjane-tip-container-main">
                        <span><?php echo hostjane_getLogo(40, 40); ?></span>
                        <span class="x">x</span>
                        <span class="hostjane-tip-option hostjane-tip-option-5 selected" onclick="hostjane_setTipAmount(5)">$5</span>
                        <span class="hostjane-tip-option hostjane-tip-option-10" onclick="hostjane_setTipAmount(10)">$10</span>
                        <span class="hostjane-tip-option hostjane-tip-option-20" onclick="hostjane_setTipAmount(20)">$20</span>
                        <span><input id="hostjane_tip_amount" type="text" placeholder="$" min="1" max="4" onkeyup="hostjane_setCustomTipAmount(this)" value="$5" style="width: 60px !important"></span>
                    </div>
                    <a class="hostjane-tip-submit" href="<?php echo esc_html($plugin->studio_url); ?>?send_tip=5" target="_blank">Support $<span id="hostjane_tip_custom_amount">5</span></a>
                    <a class="hostjane-studio-link" href="<?php echo esc_html($plugin->studio_url); ?>" target="_blank">View my studio</a>
                </div>
                <a id="hostjane_tip_btn" class="opened" onclick="hostjane_toogleTips()"
                    style="<?php if ($plugin->align == 'right') { ?>margin-left: auto;<?php } else { ?>margin-right: auto;<?php } ?>">
                    <span class="closed"><?php echo hostjane_getTipLogo(80, 80); ?></span>
                    <span class="opened"><?php echo hostjane_getLogo(80, 80); ?></span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="hostjane-admin-footer">
    <p>Visit your <a href="https://www.hostjane.com/marketplace/reporting" target="_blank">HostJane Reporting</a> dashboard for payment history, download invoices, make payout requests and other settings.</p>
    <div class="hostjane-admin-footer-container">
        <span class="copyright-text">© <?php echo date("Y"); ?> HostJane</span>
        <div class="hostjane-admin-footer-container-links">
            <a href="https://www.hostjane.com/about" target="_blank">About</a>
            <a href="https://www.hostjane.com/sell" target="_blank">Start Selling</a>
            <a href="https://help.hostjane.com" target="_blank">Help</a>
            <a href="https://www.hostjane.com/legal/tos/" target="_blank">Terms</a>
        </div>
        <div class="hostjane-admin-footer-social-links">
            <a href="https://www.instagram.com/hostjane" target="_blank">
                <svg width="30px" height="30px" viewBox="0 0 3365 3365" xmlns="http://www.w3.org/2000/svg">
                    <defs><radialGradient id="0" cx="217.76" cy="3290.99" r="4271.92" gradientUnits="userSpaceOnUse"><stop offset=".09" stop-color="#fa8f21"/><stop offset=".78" stop-color="#d82d7e"/></radialGradient><radialGradient id="1" cx="2330.61" cy="3182.95" r="3759.33" gradientUnits="userSpaceOnUse"><stop offset=".64" stop-color="#8c3aaa" stop-opacity="0"/><stop offset="1" stop-color="#8c3aaa"/></radialGradient></defs><path d="M853.2,3352.8c-200.1-9.1-308.8-42.4-381.1-70.6-95.8-37.3-164.1-81.7-236-153.5S119.7,2988.6,82.6,2892.8c-28.2-72.3-61.5-181-70.6-381.1C2,2295.4,0,2230.5,0,1682.5s2.2-612.8,11.9-829.3C21,653.1,54.5,544.6,82.5,472.1,119.8,376.3,164.3,308,236,236c71.8-71.8,140.1-116.4,236-153.5C544.3,54.3,653,21,853.1,11.9,1069.5,2,1134.5,0,1682.3,0c548,0,612.8,2.2,829.3,11.9,200.1,9.1,308.6,42.6,381.1,70.6,95.8,37.1,164.1,81.7,236,153.5s116.2,140.2,153.5,236c28.2,72.3,61.5,181,70.6,381.1,9.9,216.5,11.9,281.3,11.9,829.3,0,547.8-2,612.8-11.9,829.3-9.1,200.1-42.6,308.8-70.6,381.1-37.3,95.8-81.7,164.1-153.5,235.9s-140.2,116.2-236,153.5c-72.3,28.2-181,61.5-381.1,70.6-216.3,9.9-281.3,11.9-829.3,11.9-547.8,0-612.8-1.9-829.1-11.9" fill="url(#0)"/><path d="M853.2,3352.8c-200.1-9.1-308.8-42.4-381.1-70.6-95.8-37.3-164.1-81.7-236-153.5S119.7,2988.6,82.6,2892.8c-28.2-72.3-61.5-181-70.6-381.1C2,2295.4,0,2230.5,0,1682.5s2.2-612.8,11.9-829.3C21,653.1,54.5,544.6,82.5,472.1,119.8,376.3,164.3,308,236,236c71.8-71.8,140.1-116.4,236-153.5C544.3,54.3,653,21,853.1,11.9,1069.5,2,1134.5,0,1682.3,0c548,0,612.8,2.2,829.3,11.9,200.1,9.1,308.6,42.6,381.1,70.6,95.8,37.1,164.1,81.7,236,153.5s116.2,140.2,153.5,236c28.2,72.3,61.5,181,70.6,381.1,9.9,216.5,11.9,281.3,11.9,829.3,0,547.8-2,612.8-11.9,829.3-9.1,200.1-42.6,308.8-70.6,381.1-37.3,95.8-81.7,164.1-153.5,235.9s-140.2,116.2-236,153.5c-72.3,28.2-181,61.5-381.1,70.6-216.3,9.9-281.3,11.9-829.3,11.9-547.8,0-612.8-1.9-829.1-11.9" fill="url(#1)"/><path d="M1269.25,1689.52c0-230.11,186.49-416.7,416.6-416.7s416.7,186.59,416.7,416.7-186.59,416.7-416.7,416.7-416.6-186.59-416.6-416.7m-225.26,0c0,354.5,287.36,641.86,641.86,641.86s641.86-287.36,641.86-641.86-287.36-641.86-641.86-641.86S1044,1335,1044,1689.52m1159.13-667.31a150,150,0,1,0,150.06-149.94h-0.06a150.07,150.07,0,0,0-150,149.94M1180.85,2707c-121.87-5.55-188.11-25.85-232.13-43-58.36-22.72-100-49.78-143.78-93.5s-70.88-85.32-93.5-143.68c-17.16-44-37.46-110.26-43-232.13-6.06-131.76-7.27-171.34-7.27-505.15s1.31-373.28,7.27-505.15c5.55-121.87,26-188,43-232.13,22.72-58.36,49.78-100,93.5-143.78s85.32-70.88,143.78-93.5c44-17.16,110.26-37.46,232.13-43,131.76-6.06,171.34-7.27,505-7.27S2059.13,666,2191,672c121.87,5.55,188,26,232.13,43,58.36,22.62,100,49.78,143.78,93.5s70.78,85.42,93.5,143.78c17.16,44,37.46,110.26,43,232.13,6.06,131.87,7.27,171.34,7.27,505.15s-1.21,373.28-7.27,505.15c-5.55,121.87-25.95,188.11-43,232.13-22.72,58.36-49.78,100-93.5,143.68s-85.42,70.78-143.78,93.5c-44,17.16-110.26,37.46-232.13,43-131.76,6.06-171.34,7.27-505.15,7.27s-373.28-1.21-505-7.27M1170.5,447.09c-133.07,6.06-224,27.16-303.41,58.06-82.19,31.91-151.86,74.72-221.43,144.18S533.39,788.47,501.48,870.76c-30.9,79.46-52,170.34-58.06,303.41-6.16,133.28-7.57,175.89-7.57,515.35s1.41,382.07,7.57,515.35c6.06,133.08,27.16,223.95,58.06,303.41,31.91,82.19,74.62,152,144.18,221.43s139.14,112.18,221.43,144.18c79.56,30.9,170.34,52,303.41,58.06,133.35,6.06,175.89,7.57,515.35,7.57s382.07-1.41,515.35-7.57c133.08-6.06,223.95-27.16,303.41-58.06,82.19-32,151.86-74.72,221.43-144.18s112.18-139.24,144.18-221.43c30.9-79.46,52.1-170.34,58.06-303.41,6.06-133.38,7.47-175.89,7.47-515.35s-1.41-382.07-7.47-515.35c-6.06-133.08-27.16-224-58.06-303.41-32-82.19-74.72-151.86-144.18-221.43S2586.8,537.06,2504.71,505.15c-79.56-30.9-170.44-52.1-303.41-58.06C2068,441,2025.41,439.52,1686,439.52s-382.1,1.41-515.45,7.57" fill="#fff"/>
                </svg>
            </a>
            <a href="https://twitter.com/hostjane_com"  target="_blank">
                <svg width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <rect width="512" height="512" rx="15%" fill="#1da1f2"/><path fill="#fff" d="M437 152a72 72 0 01-40 12a72 72 0 0032-40a72 72 0 01-45 17a72 72 0 00-122 65a200 200 0 01-145-74a72 72 0 0022 94a72 72 0 01-32-7a72 72 0 0056 69a72 72 0 01-32 1a72 72 0 0067 50a200 200 0 01-105 29a200 200 0 00309-179a200 200 0 0035-37"/>
                </svg>
            </a>
        </div>
    </div>
</div>

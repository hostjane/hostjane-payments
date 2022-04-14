function hostjane_selectTheme(theme) {
    const colors = document.querySelectorAll('.hostjane-color');
    colors.forEach(color => {
        color.classList.remove("selected");
    });
    document.querySelectorAll('.hostjane-'+theme)[0].classList.add("selected");
    document.getElementById('set_theme').value = theme;
    document.querySelectorAll('.hostjane-plugin')[0].className = 'hostjane-plugin hostjane-'+theme+'-theme';
    document.querySelectorAll('.submit-btn')[0].className = 'submit-btn btn hostjane-'+theme;
}

function hostjane_selectAlign(select) {
    const align = select.value;
    const side_align = document.getElementById('side_spacing').value;
    if (! side_align || side_align < 0) {
        side_align = 0;
    }
    if (align == 'left') {
        document.querySelectorAll('.hostjane-plugin-container')[0].classList.add('left-sided');
        document.querySelectorAll('.hostjane-plugin')[0].style.right = 'auto';
        document.querySelectorAll('.hostjane-plugin')[0].style.left = side_align+'px';
        document.getElementById('hostjane_tip_btn').style.marginRight = 'auto';
        document.getElementById('hostjane_tip_btn').style.marginLeft = 'unset';
    } else {
        document.querySelectorAll('.hostjane-plugin-container')[0].classList.remove('left-sided');
        document.querySelectorAll('.hostjane-plugin')[0].style.left = 'auto';
        document.querySelectorAll('.hostjane-plugin')[0].style.right = side_align+'px';
        document.getElementById('hostjane_tip_btn').style.marginLeft = 'auto';
        document.getElementById('hostjane_tip_btn').style.marginRight = 'unset';
    }
}

function hostjane_setSideSpacing(input) {
    const side_align = input.value;
    if (! side_align || side_align < 1) {
        document.getElementById('side_spacing').value = 1;
        side_align = 1;
    }
    if (side_align > 200) {
        document.getElementById('side_spacing').value = 200;
        side_align = 200;
    }
    if (document.getElementById('align').value == 'left') {
        document.querySelectorAll('.hostjane-plugin')[0].style.left = side_align+'px';
    } else {
        document.querySelectorAll('.hostjane-plugin')[0].style.right = side_align+'px';
    }
}

function hostjane_setBottomSpacing(input) {
    const bottom_spacing = input.value;
    if (! bottom_spacing || bottom_spacing < 1) {
        document.getElementById('bottom_spacing').value = 1;
        bottom_spacing = 1;
    }
    if (bottom_spacing > 200) {
        document.getElementById('bottom_spacing').value = 200;
        bottom_spacing = 200;
    }

    document.querySelectorAll('.hostjane-plugin')[0].style.bottom = bottom_spacing+'px';
}

function hostjane_setTipAmount(amount) {
    if (amount > 0 && amount < 10000) {
        document.getElementById('hostjane_tip_amount').value = '$'+amount;
        const options = document.querySelectorAll('.hostjane-tip-option');
        options.forEach(color => {
            color.classList.remove("selected");
        });
        if (document.querySelectorAll('.hostjane-tip-option-'+amount).length > 0) {
            document.querySelectorAll('.hostjane-tip-option-'+amount)[0].classList.add("selected");
        }
        document.getElementById('hostjane_tip_custom_amount').innerHTML = amount;
        const url = document.querySelectorAll('.hostjane-studio-link')[0].href;
        document.querySelectorAll('.hostjane-tip-submit')[0].href = url+'?send_tip='+amount;
    }
}

function hostjane_setCustomTipAmount(input) {
    let amount = parseInt(input.value.replace('$', ''));
    if (amount < 1) {
        amount = 1;
    } else if (amount > 9999) {
        amount = 9999;
    }
    hostjane_setTipAmount(amount);
}

function hostjane_toogleTips() {
    if (document.querySelectorAll('.hostjane-plugin-container')[0].classList.contains('opened')) {
        document.getElementById('hostjane_tip_btn').classList.remove('opened');
        document.querySelectorAll('.hostjane-plugin-container')[0].classList.remove('opened');
    } else {
        document.getElementById('hostjane_tip_btn').classList.add('opened');
        document.querySelectorAll('.hostjane-plugin-container')[0].classList.add('opened');
    }
}

function hostjane_checkSellerData(username) {
    if (username.length > 0) {
        const url = 'https://www.hostjane.com/marketplace/avatar/'+username;
        fetch(url).then(data => {
            return data.json();
        }).then(response => {
            if (response.image.length > 0) {
                document.getElementById('studio_avatar').innerHTML = '<img src="'+response.image+'" class="hostjane-user-avatar">';
                document.querySelectorAll('.username-container')[0].classList.add('has-avatar');
            } else {
                document.getElementById('studio_doesnot_exists').style.display = 'block';
            }
        })
    }
}

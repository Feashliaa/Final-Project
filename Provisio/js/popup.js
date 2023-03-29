function onClick(element) {
    console.log("onClick function called");
    var popup = document.getElementById("popup");
    var img = document.getElementById("popup_image");
    var caption = document.querySelector('.caption');
    var overlay = document.querySelector('.overlay');
    var closeButton = document.querySelector('.close');

    console.log("Element src is " + element.src);

    const srcParts = element.src.split('/');
    console.log("srcParts is " + srcParts);
    const lastSrcPart = srcParts.pop();
    console.log("lastSrcPart is " + lastSrcPart);
    var domain = window.location.protocol + "//" + window.location.hostname;
    console.log("domain is " + domain);
    if (lastSrcPart === "dbl_full.jpg") {
        img.src = domain + "/provisio/Provisio/images/dbl_full_lg.jpg";
    } else if (lastSrcPart === "queen.jpg") {
        img.src = domain + "/provisio/Provisio/images/queen_lg.jpg";
    } else if (lastSrcPart === "dbl_queen.jpg") {
        img.src = domain + "/provisio/Provisio/images/dbl_queen_lg.jpg";
    } else if (lastSrcPart === "king.jpg") {
        img.src = domain + "/provisio/Provisio/images/king_lg.jpg";
    }

    img.onload = function () {
        popup.style.display = 'block';
        popup.style.textAlign = "center";
        popup.style.marginLeft = "0px auto";
        popup.style.marginRight = "0px auto";
        popup.style.marginTop = "0px";
        overlay.style.display = 'block'; // Show the overlay
        closeButton.style.display = 'block'; // Show the 'x' button
        caption.style.display = 'block'; // Show the caption element
        console.log("caption display set to block");
    };

    console.log("img src set to " + img.src);

    if (popup.style.display === 'block') {
        return;
    }
}

function closeImage() {
    var popup = document.getElementById("popup");
    var img = document.getElementById("popup_image");
    var caption = document.querySelector('.caption');
    var overlay = document.querySelector('.overlay');
    var closeButton = document.querySelector('.close');

    img.style.transform = "none";
    img.style.marginTop = "0px";
    popup.style.width = "auto";
    popup.style.height = "auto";
    popup.style.display = 'none';
    caption.style.display = 'none';
    overlay.style.display = 'none';
    closeButton.style.display = 'none';

    // Reset the src attribute to an empty string
    img.src = '';
}
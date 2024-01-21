window.onscroll = ()=>{
    // On Scrolling page, move the header H1 to right.
    document.getElementById("header").style.left = (110 + window.scrollY) * 1.1 + "px";
}
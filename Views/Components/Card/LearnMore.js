function LearnMoreActivate(text) {
    if (document.getElementById(text).style.cssText == 'display: inline;')
        document.getElementById(text).style.cssText = 'display: none;';
    else
        document.getElementById(text).style.cssText = 'display: inline;';
}

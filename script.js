window.addEventListener('resize', function() {
    if (window.innerWidth <= 500) {
        document.getElementById('headertitle').innerHTML = "CDLF"
    }else{
        document.getElementById('headertitle').innerHTML = "Community Dog Lost and Found"
    }
});

// Also check when the page loads
if (window.innerWidth <= 500) {
    document.getElementById('headertitle').innerHTML = "CDLF"
}else{
    document.getElementById('headertitle').innerHTML = "Community Dog Lost and Found"
}
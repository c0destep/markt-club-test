function toggleNavbar(collapseID) {
    document.querySelector("#" + collapseID).classList.toggle("hidden")
}

function closeAlert(event) {
    let element = event.target
    while (element.nodeName !== "BUTTON") {
        element = element.parentNode
    }
    element.parentNode.parentNode.removeChild(element.parentNode)
}

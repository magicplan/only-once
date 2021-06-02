(() => {
    const $linkInput = document.getElementById('link-input')
    const $copyLinkBtn = document.getElementById('copy-link-btn')

    if ($copyLinkBtn) {
        $copyLinkBtn.addEventListener('click', () => {
            $linkInput.focus()
            $linkInput.select()

            document.execCommand('copy')
            setTimeout(function(){
                document.execCommand('copy')
            }, 500)
        })
    }
})()
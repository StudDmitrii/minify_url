const long_uri_field = document.getElementById('long_uri');
const send_btn = document.getElementById('send_long_uri');
const short_uri_field = document.getElementById('short_uri');
const copy_btn = document.getElementById('copy_short_uri');

send_btn.addEventListener('click', async (e) => {
    e.preventDefault();
    if (long_uri_field.value == '') return;
    if (/^http(s?)\:\/{2}.{1,}/.test(long_uri_field.value) == false) {
        long_uri_field.value = '';
        long_uri_field.setAttribute('placeholder', 'неверный uri. должен начинаться с http://...');
        return;
    }

    const formData = new FormData();
    formData.append('long_uri',long_uri_field.value);

    const res = await fetch('new_uri.php',
    {
        method: 'POST',
        body: formData
    }).then(data=>data.text());
    
    if (res == '') return;
    
    short_uri_field.value = res;
});

copy_btn.addEventListener('click', async (e)=>{
    if (short_uri_field.value == '') return;
    try{
        await navigator.clipboard.writeText(short_uri_field.value);
        alert('Текст скопирован!');
    }
    catch{
        alert('Не получилось скопировать текст по кнопке! Скопируйте вручную');
    }
})
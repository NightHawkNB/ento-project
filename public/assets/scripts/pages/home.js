const typedTextSpan =document.querySelector('.typed-text')
const cursor =document.querySelector('.cursor')

let words = ["Singers", "Bands", "Venues"]

const typingDelay = 200;
const eraseDelay = 200;
//delay between current and next text
const newLetterDelay = 2000;
let index = 0;
let charIndex =0;

document.addEventListener('DOMContentLoaded' ,() =>{
    if(words.length){
        setTimeout(type, newLetterDelay);
    }
})

function type(){
    if(charIndex<words[index].length){
        typedTextSpan.textContent +=words[index].charAt(charIndex);
        charIndex++;
        setTimeout(type, typingDelay);
    }
    else{
        setTimeout(erase, newLetterDelay);
    }
}

function erase(){
    if (charIndex>0){
        typedTextSpan.textContent = words[index].substring(0,charIndex - 1);
        charIndex--;
        setTimeout(erase ,eraseDelay);
    }
    else{
        index++;
        if(index >= words.length){
            index=0;
        }
        setTimeout(type, typingDelay + 1100);
    }
}
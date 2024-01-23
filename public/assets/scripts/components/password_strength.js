const indicator = document.querySelector('.ps-indicator')
const input = document.querySelector('#password')
const weak = document.querySelector('.weak')
const medium = document.querySelector('.medium')
const strong = document.querySelector('.strong')
const text = document.querySelector('.ps-text')
const show_btn = document.querySelector('.show-btn')

let RegexWeak = /[a-z]/
let RegexMedium = /\d+/
let RegexStrong = /.[!,@,#,$,%,^,&,*,(,)]/

// Function for checking password strength
function trigger_password() {
    if(input.value !== "") {
        indicator.style.display = 'flex'
        text.style.display = 'block'

        let no = 0

        if(input.value.length <= 6 && (input.value.match(RegexWeak) || input.value.match(RegexMedium) || input.value.match(RegexStrong))) no = 1
        if(input.value.length >= 6 && ((input.value.match(RegexWeak) && input.value.match(RegexMedium)) || (input.value.match(RegexMedium) && input.value.match(RegexStrong)) || (input.value.match(RegexWeak) && input.value.match(RegexMedium)))) no = 2
        if(input.value.length >= 6 && input.value.match(RegexWeak) && input.value.match(RegexMedium) && input.value.match(RegexStrong)) no = 3

        if(no === 1) {
            weak.classList.add('active')
            text.style.display = 'block'
            text.classList.add('weak')
            text.textContent = "Your password is too weak"
        }

        if(no === 2) {
            medium.classList.add('active')
            text.style.display = 'block'
            text.classList.add('medium')
            text.textContent = "Your password is ok"
        } else {
            medium.classList.remove('active')
            text.classList.remove('medium')
        }

        if(no === 3) {
            medium.classList.add('active')
            strong.classList.add('active')
            text.style.display = 'block'
            text.classList.add('strong')
            text.textContent = "Your password is Strong"
        } else {
            strong.classList.remove('active')
            text.classList.remove('strong')
        }


        // Showing the show-password button and change the type of the input field to view the password
        show_btn.style.display = 'block'
        show_btn.onclick = () => {
            if(input.type === 'password') {
                input.type = "text"
                show_btn.classList.add('hide')
            } else {
                input.type = "password"
                show_btn.classList.remove('hide')
            }
        }

    } else {
        indicator.style.display = 'none'
        text.style.display = 'none'
    }
}
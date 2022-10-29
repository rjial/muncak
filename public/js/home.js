window.onload = (event) => {
    let scrollpos = window.scrollY
    const header = document.getElementById('navbar')
    const header_height = header.offsetHeight
  
    const add_class_on_scroll = () => header.classList.add("bg-white", "border-b", "border-slate-300")
    const remove_class_on_scroll = () => header.classList.remove("bg-white", "border-b", "border-slate-300")
    scrollpos = window.scrollY;
  
      if (scrollpos >= header_height) { add_class_on_scroll() }
      else { remove_class_on_scroll() }
  
      console.log(scrollpos)
  
    window.addEventListener('scroll', function() { 
      scrollpos = window.scrollY;
  
      if (scrollpos >= header_height) { add_class_on_scroll() }
      else { remove_class_on_scroll() }
  
      console.log(scrollpos)
    })
}
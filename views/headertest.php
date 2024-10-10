<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task manager</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body x-data="{open : false}">
    <header class="fixed h-24 bg-blue-700 flex justify-between px-6 md:px-20 py-8 w-full items-center">
        <div class="logo ">
            <img class="h-8" src="https://res.cloudinary.com/thirus/image/upload/v1631988912/logos/chitchat-logo_pkpwwu.png">
        </div>
       
        <nav class="tex-white">
            <button @click="open = ! open" class="flex md:hidden z-50">
                <img x-show="!open" class="w-6 h-6" src="https://img.icons8.com/small/64/ffffff/menu.png"/> 
                <img x-show="open" class="w-6 h-6" src="https://img.icons8.com/small/64/ffffff/delete-sign.png"/>
             </button>
             <ul :class="{'block': open, 'hidden': !open}" 
              class="fixed min-h-screen bg-blue-700 left-0 right-0  text-white space-y-4 p-4 md:relative md:flex md:flex-row md:min-h-0 md:space-y-0 md:space-x-6" 
              >
                <li><a>Home</a></li>
                <li><a>Features</a></li>
                <li><a>About</a></li>
                <li><a>Contact</a></li>
             </ul>
            
        </nav>
    </header>
    
</body>
</html>
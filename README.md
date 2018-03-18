# ProyectoFinalJonAitor2018
Proyecto final DAM

---
Explicación del [proceso](https://github.com/AitorBM/proyecto-2017/blob/master/PROCESO.md) que hemos seguido.

> Info del proyecto en [dropbox](https://www.dropbox.com/sh/dvc6av0rjhkq94b/AADIgfvF83NRkawAnpXX86tZa?dl=0).
<br/>Info del proyecto en [github](https://egibide-dam.github.io/proyecto-2017/).
<br/>[Repositorio](https://github.com/Egibide-DAM/proyecto-2017) original.
---

- ## [Descargar](https://github.com/AitorBM/proyecto-2017/archive/master.zip) o clonar éste [repositorio](https://github.com/AitorBM/proyecto-2017).
 > **Nota** Lo realmente necesario es el archivo Vangranfile,<br/>
   puedes crear una carpeta y solo descargar dicho archivo en ella.
- ## Instalar [VirtualBox](https://www.virtualbox.org/wiki/Downloads) y su [Extension Pack](https://download.virtualbox.org/virtualbox/5.2.6/Oracle_VM_VirtualBox_Extension_Pack-5.2.6-120293.vbox-extpack).
- ## Instalar [Vagrant](https://www.vagrantup.com/downloads.html).
- ## Abrir la consola de windows
>Presiona la tecla de windows + r.<br/>
>Escribe cmd y presiona enter
 - ## Posicionate en la carpeta que contiene el Vagrantfile.
 ```sh
 cd "ruta"
 ```
 - ## Inicia el servidor.
 ```sh
 vagrant up
 ```
 - ## Si en la consola no se ve ningúna inserción reiniciar Photon.
  > Desde el botón reset.
  
  > **Nota** En caso de querer acceder a la máquina Vagrant por ssh ir al VagrantFile y comentar estas tres líneas con una almohadilla:
  ```sh
  # config.vm.define "web" do |web|
    # web.vm.provision "shell", inline: "nodejs /var/www/html/web/app_prueba02.js"
  # end
  ```

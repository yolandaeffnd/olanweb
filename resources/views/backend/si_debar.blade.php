<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
        
            <li class="nav-item nav-category">
              <a class="nav-link" href="#">
                <span class="menu-title">MENU</span>
                <i class="icon-menu menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="">
                <span class="menu-title">Beranda</span>
                <i class="icon-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('beasiswa.index')}}">
                <span class="menu-title">Beasiswa</span>
                <i class="icon-bubble menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#kelas" aria-expanded="false" aria-controls="kelas">
                <span class="menu-title">HALAQAH</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
              <div class="collapse" id="kelas">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('halaqah.index')}}">Halaqah</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('halaqahsantri.index')}}">Halaqah Santri</a></li>
                </ul>
              </div>
            </li> 
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#kegiatan" aria-expanded="false" aria-controls="kegiatan">
                <span class="menu-title">DATA MASTER</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
              <div class="collapse" id="kegiatan">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('hari.index')}}">Hari</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('tempat.index')}}">Tempat</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('shift.index')}}">Shift</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('periode2.index')}}">Periode</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('agenda.index')}}">Agenda</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('guru.index')}}">
                <span class="menu-title">Guru</span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('santri.index')}}">
                <span class="menu-title">Santri</span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('registrasi.index')}}">
                <span class="menu-title">Registrasi</span>
                <i class="icon-folder-alt  menu-icon"></i>
              </a>
            </li>

     
             <li class="nav-item">
              <a class="nav-link" href="{{route('pembayaran.index')}}">
                <span class="menu-title">Pembayaran</span>
                <i class="icon-wallet  menu-icon"></i>
              </a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="{{route('penempatan2.index')}}">
                <span class="menu-title">Penempatan</span>
                <i class="icon-home  menu-icon"></i>
              </a>
            </li>

              <li class="nav-item">
              <a class="nav-link" href="{{route('jadwal.index')}}">
                <span class="menu-title">Jadwal</span>
                <i class="icon-check menu-icon"></i>
              </a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="{{route('pertemuan.index')}}">
                <span class="menu-title">Pertemuan</span>
                <i class="icon-people menu-icon"></i>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{route('pembelajaran.index')}}">
                <span class="menu-title">Pembelajaran</span>
                <i class="icon-book-open  menu-icon"></i>
              </a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">User</span>
                <i class="icon-book-open  menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('pimpinan.index')}}">
                <span class="menu-title">Pimpinan</span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li>

             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#Laporan" aria-expanded="false" aria-controls="Laporan">
                <span class="menu-title">LAPORAN</span>
                <i class="icon-docs  menu-icon"></i>
              </a>
              <div class="collapse" id="Laporan">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('laporan/registrasi_view')}}">Laporan Registrasi</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('laporan/santri_view')}}">Laporan Santri</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('laporan/pembelajaran_view')}}">Laporan Pembelajaran</a></li>
                  
                  <li class="nav-item"> <a class="nav-link" href="{{url('laporan/dftunggu_view')}}">Laporan Daftar Tunggu</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('laporan/pembayaran_view')}}">Laporan Pembayaran</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('laporan/halaqahsantri_view')}}">Laporan Halaqah Santri</a></li>
                </ul>
              </div>
              

            </li>
       
            
          </ul>
</nav


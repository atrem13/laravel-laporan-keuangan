<li>
    <a href="{{ route('home.index') }}" class="waves-effect"><i class="fas fa-wd fa-home"></i>
        <span>
            Dashboard
        </span>
    </a>
</li>
<li>
    <a href="{{ route('laporan_keuangan.index') }}" class="waves-effect"><i class="fas fa-wd fa-clipboard-list"></i>
        <span>
            Laporan Keuangan
        </span>
    </a>
</li>
<li>
    <a href="{{ route('summary_keuangan.index') }}" class="waves-effect"><i class="fas fa-wd fa-cash-register"></i>
        <span>
            Laporan Penjualan
        </span>
    </a>
</li>
<hr>
<li>
    <a href="{{ route('admin.edit', auth()->guard('admin')->user()->id) }}" class="waves-effect"><i class="fas fa-wd fa-user-cog"></i>
        <span>
            Setting Pengguna
        </span>
    </a>
</li>

<style>
    .gpk-sidebar {
        width: 260px;
        flex-shrink: 0;
        padding: 1.25rem 1rem;
        background-color: #1e3a8a;
        color: #fff;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease-in-out;
    }

    .gpk-sidebar-title {
        margin-bottom: 0.75rem;
        color: #93c5fd;
        font-size: 1.25rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .gpk-sidebar-menu {
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .gpk-sidebar-menu li a {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.65rem 0.85rem;
        border-radius: 6px;
        color: #e2e8f0;
        font-size: 1.05rem;
        text-decoration: none;
        transition: background 0.2s;
    }

    .gpk-sidebar-menu li a:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .gpk-sidebar-menu li a.active {
        background-color: #10b981;
        color: #fff;
        font-weight: 600;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .gpk-sidebar-toggle {
        display: none;
        align-items: center;
        gap: 0.5rem;
        width: fit-content;
        margin-bottom: 1rem;
        padding: 0.5rem 0.75rem;
        border: 0;
        border-radius: 4px;
        background: #1e3a8a;
        color: #fff;
        font-size: 1.1rem;
        cursor: pointer;
    }

    .gpk-sidebar-backdrop {
        display: none;
        position: fixed;
        z-index: 1035;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    @media (max-width: 900px) {
        .gpk-sidebar-toggle {
            display: inline-flex;
        }

        .gpk-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040;
            height: 100vh;
            transform: translateX(-100%);
        }

        .gpk-sidebar.is-open {
            transform: translateX(0);
        }

        .gpk-sidebar-backdrop.is-visible {
            display: block;
        }
    }
</style>

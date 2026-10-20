<style>
    .gpk-stat-page,
    .gpk-stat-page * {
        box-sizing: border-box;
    }

    .gpk-stat-page {
        display: flex;
        align-items: stretch;
        min-height: calc(100vh - var(--nav-h-desktop, 84px));
        margin: -1.5rem;
        background: #f7f5ee;
        color: #1a2e1f;
        font-family: var(--f-body, 'Manrope', sans-serif);
    }

    .gpk-stat-content {
        flex: 1;
        min-width: 0;
        padding: clamp(1.25rem, 3vw, 2.5rem);
    }

    .gpk-stat-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 1.5rem;
        margin-bottom: 1.75rem;
    }

    .gpk-stat-eyebrow {
        display: block;
        margin-bottom: 0.45rem;
        color: #8b6d21;
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .gpk-stat-heading h1 {
        margin: 0;
        color: #1a2e1f;
        font-family: var(--f-display, Georgia, serif);
        font-size: clamp(2.25rem, 4vw, 3.5rem);
        font-weight: 600;
        line-height: 1.12;
    }

    .gpk-stat-heading p {
        margin: 0.55rem 0 0;
        color: #657166;
        font-size: 1.5rem;
    }

    .gpk-export-filters {
        display: flex;
        align-items: flex-end;
        gap: 1rem;
        margin-bottom: 1rem;
        padding: 1rem 1.2rem;
        border: 1px solid #e8e3d6;
        border-radius: 10px;
        background: #fffdf8;
        box-shadow: 0 5px 18px rgba(26, 46, 31, 0.045);
    }

    .gpk-export-filters-heading {
        flex: 1;
        min-width: 180px;
    }

    .gpk-export-filters-heading .gpk-stat-eyebrow {
        margin-bottom: 0.25rem;
    }

    .gpk-export-filters-heading p {
        margin: 0;
        color: #7c867c;
        font-size: 1.3rem;
    }

    .gpk-export-filter-field {
        display: grid;
        gap: 0.3rem;
    }

    .gpk-export-filter-field label {
        color: #526052;
        font-size: 1.5rem;
        font-weight: 800;
    }

    .gpk-export-filter-field select {
        min-width: 145px;
        height: 40px;
        padding: 0 0.7rem;
        border: 1px solid #d9d3c4;
        border-radius: 6px;
        background: #fff;
        color: #334238;
        font: inherit;
        font-size: 1.9rem;
    }

    .gpk-export-filters .gpk-stat-button {
        min-height: 40px;
        cursor: pointer;
    }

    .gpk-stat-button {
        display: inline-flex;
        flex: 0 0 auto;
        align-items: center;
        gap: 0.55rem;
        padding: 0.75rem 1rem;
        border: 1px solid #2c5530;
        border-radius: 6px;
        background: #2c5530;
        color: #fff !important;
        font-size: 1.5rem;
        font-weight: 700;
        text-decoration: none !important;
        transition: background 0.2s, transform 0.2s;
    }

    .gpk-stat-button:hover {
        transform: translateY(-1px);
        background: #1a3b20;
    }

    .gpk-stat-cards {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .gpk-stat-card,
    .gpk-stat-panel {
        border: 1px solid #e8e3d6;
        border-radius: 10px;
        background: #fffdf8;
        box-shadow: 0 5px 18px rgba(26, 46, 31, 0.045);
    }

    .gpk-stat-card {
        min-width: 0;
        padding: 1.15rem 1.2rem;
        border-top: 4px solid #2c5530;
        background: #edf3e9;
    }

    .gpk-stat-card:nth-child(2) {
        border-top-color: #b8911e;
        background: #f7f1df;
    }

    .gpk-stat-card:nth-child(3) {
        border-top-color: #287553;
        background: #e9f2ee;
    }

    .gpk-stat-card:nth-child(4) {
        border-top-color: #526f92;
        background: #edf0f5;
    }

    .gpk-stat-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
        margin-bottom: 1.05rem;
    }

    .gpk-stat-label {
        color: #2c5530;
        font-size: 1.4rem;
        font-weight: 800;
        letter-spacing: 0.07em;
        text-transform: uppercase;
    }

    .gpk-stat-card:nth-child(2) .gpk-stat-label {
        color: #806824;
    }

    .gpk-stat-card:nth-child(3) .gpk-stat-label {
        color: #287553;
    }

    .gpk-stat-card:nth-child(4) .gpk-stat-label {
        color: #455d76;
    }

    .gpk-stat-icon {
        display: grid;
        width: 2.35rem;
        height: 2.35rem;
        flex: 0 0 auto;
        place-items: center;
        border-radius: 8px;
        background: #edf3e9;
        color: #2c5530;
        font-size: 2.1rem;
    }

    .gpk-stat-card:nth-child(2) .gpk-stat-icon {
        background: #f5f0dd;
        color: #987522;
    }

    .gpk-stat-card:nth-child(3) .gpk-stat-icon {
        background: #e9f2ee;
        color: #287553;
    }

    .gpk-stat-card:nth-child(4) .gpk-stat-icon {
        background: #edf0f5;
        color: #455d76;
    }

    .gpk-stat-value {
        margin: 0;
        color: #1a2e1f;
        font-family: var(--f-display, Georgia, serif);
        font-size: clamp(1.75rem, 3vw, 2.5rem);
        font-weight: 600;
        line-height: 1.1;
    }

    .gpk-stat-value--compact {
        overflow-wrap: anywhere;
        font-size: clamp(1.35rem, 2vw, 1.8rem);
    }

    .gpk-stat-unit {
        color: #758075;
        font-family: var(--f-body, 'Manrope', sans-serif);
        font-size: 1.5rem;
        font-weight: 500;
    }

    .gpk-stat-caption {
        margin: 0.45rem 0 0;
        color: #8b9389;
        font-size: 1.4rem;
    }

    .gpk-stat-main-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.5fr) minmax(250px, 0.85fr);
        gap: 1rem;
        margin-top: 1rem;
    }

    .gpk-stat-main-grid--single {
        grid-template-columns: minmax(0, 1fr);
    }

    .gpk-stat-panel {
        min-width: 0;
        padding: 1.35rem;
    }

    .gpk-stat-panel-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        margin: -1.35rem -1.35rem 1.25rem;
        padding: 1.1rem 1.35rem;
        border-bottom: 1px solid #dce7d8;
        border-radius: 10px 10px 0 0;
        background: #edf3e9;
        box-shadow: inset 4px 0 #2c5530;
    }

    .gpk-stat-panel-heading h2 {
        margin: 0;
        color: #214b2a;
        font-family: var(--f-display, Georgia, serif);
        font-size: 1.9rem;
        font-weight: 600;
    }

    .gpk-stat-panel-heading p {
        margin: 0.35rem 0 0;
        color: #7c867c;
        font-size: 1.2rem;
    }

    .gpk-stat-tag {
        padding: 0.35rem 0.55rem;
        border-radius: 99px;
        background: #f2ede0;
        color: #806824;
        font-size: 1.2rem;
        font-weight: 800;
        letter-spacing: 0.04em;
        white-space: nowrap;
    }

    .gpk-stat-empty {
        display: grid;
        min-height: 210px;
        padding: 1.5rem;
        place-content: center;
        justify-items: center;
        border: 1px dashed #d9d3c4;
        border-radius: 8px;
        background: #fbfaf5;
        text-align: center;
    }

    .gpk-stat-empty-icon {
        display: grid;
        width: 3rem;
        height: 3rem;
        margin-bottom: 0.8rem;
        place-items: center;
        border-radius: 50%;
        background: #edf3e9;
        color: #2c5530;
        font-size: 1.15rem;
    }

    .gpk-stat-empty h3 {
        margin: 0;
        color: #314436;
        font-size: 1.08rem;
        font-weight: 800;
    }

    .gpk-stat-empty p {
        max-width: 390px;
        margin: 0.4rem 0 0;
        color: #7c867c;
        font-size: 0.9rem;
        line-height: 1.65;
    }

    .gpk-stat-note {
        display: flex;
        align-items: flex-start;
        gap: 0.7rem;
        margin-top: 1rem;
        padding: 0.9rem 1rem;
        border-left: 3px solid #b8911e;
        border-radius: 0 6px 6px 0;
        background: #f5f0df;
        color: #6e6038;
        font-size: 0.97rem;
        line-height: 1.6;
    }

    .gpk-export-chart {
        display: grid;
        gap: 1.1rem;
        padding: 0.25rem 0;
    }

    .gpk-export-chart-legend {
        display: grid;
        grid-template-columns: minmax(100px, 145px) minmax(0, 1fr) 120px 135px;
        gap: 1rem;
        padding-bottom: 0.55rem;
        border-bottom: 1px solid #eeeadd;
        color: #778176;
        font-size: 0.99rem;
        font-weight: 800;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .gpk-export-chart-legend span:nth-child(2) {
        grid-column: 3;
        text-align: right;
    }

    .gpk-export-chart-legend span:nth-child(3) {
        grid-column: 4;
        text-align: right;
    }

    .gpk-export-chart-row {
        display: grid;
        grid-template-columns: minmax(100px, 145px) minmax(0, 1fr) 120px 135px;
        align-items: center;
        gap: 1rem;
    }

    .gpk-export-chart-country {
        overflow: hidden;
        color: #334238;
        font-size: 1.2rem;
        font-weight: 700;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .gpk-export-chart-track {
        height: 1rem;
        overflow: hidden;
        border-radius: 99px;
        background: #edf0e8;
    }

    .gpk-export-chart-bar {
        width: var(--bar-width);
        height: 100%;
        border-radius: inherit;
        background: linear-gradient(90deg, #2c5530, #72a34f);
    }

    .gpk-export-chart-row:nth-child(2n) .gpk-export-chart-bar {
        background: linear-gradient(90deg, #a57a14, #e1bd4a);
    }

    .gpk-export-chart-row:nth-child(3n) .gpk-export-chart-bar {
        background: linear-gradient(90deg, #326b86, #68abc0);
    }

    .gpk-export-chart-row:nth-child(4n) .gpk-export-chart-bar {
        background: linear-gradient(90deg, #a64d35, #df8a5c);
    }

    .gpk-export-chart-value {
        color: #020202;
        font-size: 1.2rem;
        font-weight: 700;
        text-align: right;
        white-space: nowrap;
    }

    .gpk-export-chart-volume {
        color: #020202;
        font-size: 1.2rem;
        font-weight: 700;
        text-align: right;
        white-space: nowrap;
    }

    .gpk-export-chart-axis {
        display: flex;
        justify-content: space-between;
        margin: 0.7rem 286px 0 161px;
        color: #8b9389;
        font-size: 0.82rem;
    }

    .gpk-export-chart-caption {
        margin: 1.1rem 0 0;
        color: #8b9389;
        font-size: 0.9rem;
    }

    @media (max-width: 1100px) {
        .gpk-stat-cards {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .gpk-stat-main-grid {
            grid-template-columns: minmax(0, 1fr);
        }

        .gpk-export-chart-legend {
            grid-template-columns: minmax(100px, 145px) minmax(0, 1fr) 110px 120px;
            gap: 0.65rem;
        }

        .gpk-export-chart-row {
            grid-template-columns: minmax(100px, 145px) minmax(0, 1fr) 110px 120px;
            gap: 0.65rem;
        }

        .gpk-export-chart-axis {
            margin-right: 256px;
        }
    }

    @media (max-width: 900px) {
        .gpk-stat-page {
            display: block;
            min-height: calc(100vh - var(--nav-h-mobile, 68px));
        }
    }

    @media (max-width: 600px) {
        .gpk-export-filters {
            align-items: stretch;
            flex-wrap: wrap;
            gap: 0.75rem;
            padding: 1rem;
        }

        .gpk-export-filters-heading {
            flex: 1 0 100%;
        }

        .gpk-export-filter-field {
            flex: 1;
            min-width: 0;
        }

        .gpk-export-filter-field select {
            width: 100%;
            min-width: 0;
        }

        .gpk-export-filters .gpk-stat-button {
            align-self: flex-end;
        }

        .gpk-stat-heading {
            align-items: flex-start;
            flex-direction: column;
            gap: 1rem;
        }

        .gpk-stat-cards {
            grid-template-columns: minmax(0, 1fr);
            gap: 0.7rem;
        }

        .gpk-stat-card {
            padding: 1rem;
        }

        .gpk-stat-card-top {
            margin-bottom: 0.65rem;
        }

        .gpk-stat-value {
            font-size: 1.8rem;
        }

        .gpk-stat-panel {
            padding: 1rem;
        }

        .gpk-stat-panel-heading {
            margin: -1rem -1rem 1rem;
            padding: 1rem;
        }

        .gpk-export-chart {
            gap: 1rem;
        }

        .gpk-export-chart-row {
            grid-template-columns: minmax(76px, 96px) minmax(0, 1fr);
            gap: 0.6rem;
        }

        .gpk-export-chart-legend {
            grid-template-columns: minmax(76px, 96px) minmax(0, 1fr) auto;
            gap: 0.6rem;
        }

        .gpk-export-chart-legend span:first-child {
            grid-row: 1;
        }

        .gpk-export-chart-legend span:nth-child(2) {
            grid-column: 2;
        }

        .gpk-export-chart-legend span:nth-child(3) {
            grid-column: 3;
        }

        .gpk-export-chart-track {
            grid-column: 2;
            grid-row: 2;
        }

        .gpk-export-chart-country {
            grid-column: 1;
            grid-row: 1 / 3;
            white-space: normal;
        }

        .gpk-export-chart-value,
        .gpk-export-chart-volume {
            grid-column: 2;
            grid-row: 1;
            text-align: left;
        }

        .gpk-export-chart-volume {
            grid-column: 2;
            grid-row: 3;
            text-align: left;
        }

        .gpk-export-chart-axis {
            margin-left: 102px;
            margin-right: 0;
        }
    }
</style>

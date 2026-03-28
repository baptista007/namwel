<?php
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card bookings">
        <span class="stat-change up"><i class="bi bi-arrow-up"></i> 12%</span>
        <div class="stat-icon">
            <i class="bi bi-calendar-check"></i>
        </div>
        <div class="stat-value">156</div>
        <div class="stat-label">Total Bookings</div>
    </div>

    <div class="stat-card revenue">
        <span class="stat-change up"><i class="bi bi-arrow-up"></i> 8%</span>
        <div class="stat-icon">
            <i class="bi bi-currency-dollar"></i>
        </div>
        <div class="stat-value">$48,500</div>
        <div class="stat-label">Total Revenue</div>
    </div>

    <div class="stat-card customers">
        <span class="stat-change up"><i class="bi bi-arrow-up"></i> 15%</span>
        <div class="stat-icon">
            <i class="bi bi-people"></i>
        </div>
        <div class="stat-value">89</div>
        <div class="stat-label">Active Customers</div>
    </div>

    <div class="stat-card tours">
        <span class="stat-change down"><i class="bi bi-arrow-down"></i> 3%</span>
        <div class="stat-icon">
            <i class="bi bi-compass"></i>
        </div>
        <div class="stat-value">24</div>
        <div class="stat-label">Available Tours</div>
    </div>
</div>

<!-- Charts Row -->
<div class="charts-row">
    <div class="chart-card">
        <div class="chart-header">
            <h3 class="chart-title">Booking Overview</h3>
            <div class="chart-actions">
                <select>
                    <option>This Week</option>
                    <option>This Month</option>
                    <option>This Year</option>
                </select>
            </div>
        </div>
        <div class="chart-placeholder">
            <i class="bi bi-bar-chart"></i>
            <p>Booking Chart</p>
            <small>Chart visualization would render here</small>
        </div>
    </div>

    <div class="chart-card">
        <div class="chart-header">
            <h3 class="chart-title">Tour Popularity</h3>
        </div>
        <div class="chart-placeholder">
            <i class="bi bi-pie-chart"></i>
            <p>Pie Chart</p>
        </div>
        <div class="donut-legend">
            <div class="legend-item">
                <span class="legend-label"><span class="legend-color" style="background: var(--primary-orange);"></span>Etosha Safari</span>
                <span class="legend-value">45%</span>
            </div>
            <div class="legend-item">
                <span class="legend-label"><span class="legend-color" style="background: var(--vibrant-green);"></span>Swakopmund</span>
                <span class="legend-value">28%</span>
            </div>
            <div class="legend-item">
                <span class="legend-label"><span class="legend-color" style="background: var(--muted-gold);"></span>Sossusvlei</span>
                <span class="legend-value">18%</span>
            </div>
            <div class="legend-item">
                <span class="legend-label"><span class="legend-color" style="background: #2196F3;"></span>Others</span>
                <span class="legend-value">9%</span>
            </div>
        </div>
    </div>
</div>

<!-- Tables Row -->
<div class="row g-4">
    <div class="col-lg-8">
        <div class="table-card">
            <div class="chart-header">
                <h3 class="chart-title">Recent Bookings</h3>
                <a href="#" class="btn btn-sm btn-outline-success">View All</a>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Tour</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="customer-cell">
                                    <div class="customer-avatar">MK</div>
                                    <span>Michael Kruger</span>
                                </div>
                            </td>
                            <td>Etosha Safari</td>
                            <td>Mar 25, 2026</td>
                            <td>$1,850</td>
                            <td><span class="status-badge confirmed">Confirmed</span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn view"><i class="bi bi-eye"></i></button>
                                    <button class="action-btn edit"><i class="bi bi-pencil"></i></button>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="customer-cell">
                                    <div class="customer-avatar">SW</div>
                                    <span>Sarah Wilson</span>
                                </div>
                            </td>
                            <td>Swakopmund Tour</td>
                            <td>Mar 28, 2026</td>
                            <td>$950</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn view"><i class="bi bi-eye"></i></button>
                                    <button class="action-btn edit"><i class="bi bi-pencil"></i></button>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="customer-cell">
                                    <div class="customer-avatar">JM</div>
                                    <span>James Miller</span>
                                </div>
                            </td>
                            <td>Sossusvlei Adventure</td>
                            <td>Mar 30, 2026</td>
                            <td>$2,200</td>
                            <td><span class="status-badge completed">Completed</span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn view"><i class="bi bi-eye"></i></button>
                                    <button class="action-btn edit"><i class="bi bi-pencil"></i></button>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="customer-cell">
                                    <div class="customer-avatar">EH</div>
                                    <span>Emma Hansen</span>
                                </div>
                            </td>
                            <td>Coastal Namibia</td>
                            <td>Apr 02, 2026</td>
                            <td>$1,450</td>
                            <td><span class="status-badge confirmed">Confirmed</span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn view"><i class="bi bi-eye"></i></button>
                                    <button class="action-btn edit"><i class="bi bi-pencil"></i></button>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="table-card">
            <div class="chart-header">
                <h3 class="chart-title">Recent Activity</h3>
            </div>
            <ul class="activity-list">
                <li class="activity-item">
                    <div class="activity-icon booking">
                        <i class="bi bi-calendar-plus"></i>
                    </div>
                    <div class="activity-content">
                        <p><strong>New booking</strong> from Michael Kruger</p>
                        <span class="activity-time">5 minutes ago</span>
                    </div>
                </li>
                <li class="activity-item">
                    <div class="activity-icon payment">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <div class="activity-content">
                        <p><strong>Payment received</strong> - $2,200</p>
                        <span class="activity-time">1 hour ago</span>
                    </div>
                </li>
                <li class="activity-item">
                    <div class="activity-icon review">
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="activity-content">
                        <p><strong>New review</strong> - 5 stars for Etosha</p>
                        <span class="activity-time">3 hours ago</span>
                    </div>
                </li>
                <li class="activity-item">
                    <div class="activity-icon inquiry">
                        <i class="bi bi-chat-left"></i>
                    </div>
                    <div class="activity-content">
                        <p><strong>Inquiry</strong> from Sarah Wilson</p>
                        <span class="activity-time">5 hours ago</span>
                    </div>
                </li>
            </ul>
        </div>

        <div class="table-card mt-4">
            <div class="chart-header">
                <h3 class="chart-title">Quick Actions</h3>
            </div>
            <div class="quick-actions">
                <a href="#" class="quick-btn">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Tour</span>
                </a>
                <a href="#" class="quick-btn">
                    <i class="bi bi-car"></i>
                    <span>Add Vehicle</span>
                </a>
                <a href="quote.html" class="quick-btn">
                    <i class="bi bi-file-earmark-plus"></i>
                    <span>New Quote</span>
                </a>
                <a href="#" class="quick-btn">
                    <i class="bi bi-person-plus"></i>
                    <span>Add Customer</span>
                </a>
            </div>
        </div>
    </div>
</div>
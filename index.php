<?php

include 'config/connection.php'; 
// Database query
$statement = "SELECT * FROM tasks";
$result = mysqli_query($conn, $statement);
?>

<style>
  /* Container & Table Layout */
  .table-card {
    max-width: 880px;
    margin: 2.5rem auto;
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 1px 3px 0 rgba(15, 23, 42, 0.03), 0 1px 2px -1px rgba(15, 23, 42, 0.03);
    overflow: hidden;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  }

  .task-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    font-size: 0.875rem;
    color: #334155;
  }

  /* Table Header */
  .task-table thead tr {
    background-color: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
  }

  .task-table th {
    padding: 0.875rem 1.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #64748b;
  }

  /* Table Body & Rows */
  .task-table tbody tr {
    border-bottom: 1px solid #f1f5f9;
    transition: background-color 0.15s ease-in-out;
  }

  .task-table tbody tr:last-child {
    border-bottom: none;
  }

  .task-table tbody tr:hover {
    background-color: #f8fafc;
  }

  .task-table td {
    padding: 1rem 1.5rem;
    vertical-align: middle;
  }

  /* Cell Column Styles */
  .cell-id {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-size: 0.8125rem;
    color: #94a3b8;
    width: 70px;
  }

  .cell-name {
    font-weight: 500;
    color: #0f172a;
  }

  .cell-desc {
    color: #64748b;
    max-width: 280px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .text-right {
    text-align: right;
  }

  /* Status Badges */
  .badge {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 500;
    line-height: 1;
  }

  .badge-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
  }

  /* Completed Status */
  .badge-completed {
    background-color: #ecfdf5;
    color: #047857;
  }
  .badge-completed .badge-dot {
    background-color: #10b981;
  }

  /* In Progress Status */
  .badge-pending {
    background-color: #fffbeb;
    color: #b45309;
  }
  .badge-pending .badge-dot {
    background-color: #f59e0b;
  }

  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 3rem 1.5rem;
    color: #94a3b8;
  }
</style>

<div class="table-card">
  <table class="task-table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Task Name</th>
        <th scope="col">Description</th>
        <th scope="col" class="text-right">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <?php while ($task = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td class="cell-id">#<?php echo htmlspecialchars($task['id']); ?></td>
            <td class="cell-name"><?php echo htmlspecialchars($task['name']); ?></td>
            <td class="cell-desc"><?php echo htmlspecialchars($task['description'] ?: '—'); ?></td>
            <td class="text-right">
              <?php if ($task['is_completed']): ?>
                <span class="badge badge-completed">
                  <span class="badge-dot"></span>
                  Completed
                </span>
              <?php else: ?>
                <span class="badge badge-pending">
                  <span class="badge-dot"></span>
                  In Progress
                </span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="4" class="empty-state">No tasks found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>